<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>
<?php  

 if($_SERVER['REQUEST_METHOD'] === "POST"){
     
     if(!empty($_POST['user-login-email']) && !empty($_POST['user-login-pass'])){
         
         $login_user_name = mysqli_real_escape_string($db_con,$_POST['user-login-email']);
         $login_user_pass = mysqli_real_escape_string($db_con,md5($_POST['user-login-pass']));
         
                 
        $query = "SELECT * FROM  user_account WHERE UserPassword='$login_user_pass' AND UserEmail='$login_user_name'";
        $result = $db_con->query($query);
        if ($result->num_rows === 1) {
          $_SESSION['login_user_name'] = $login_user_name; // Initializing Session
          
          while($row = $result->fetch_assoc()) {
              $user_name = $row['FirstName'] . ' ' . $row['LastName'];
              $user_level =  $row['UserLevel']; 
              $_SESSION['username'] = $user_name;
              $_SESSION['userlevel'] = $user_level;
              
              if ( $user_level === 'DATAENTRY' ){
                   header("location: login_menu.php");                   
              } 
              else if( $user_level === 'MANAGER') {
                 header("location: login_menu.php"); 
              }
              else if ( $user_level === 'MARSHALING' ){
                 header("location: login_menu.php");                   
              } else if ( $user_level === 'SAFETYCHECK' )
              {
                header("location: login_menu.php");  
              }
               else if ( $user_level === 'SAFETYCHECKMANUAL' )
              {
                header("location: login_menu.php");  
              }
              else if ( $user_level === 'TERMINALENTRYCHECK' )
              {
                 header("location: login_menu.php");
              }
              else if ( $user_level === 'GANTRYCHECK' )
              {
                 header("location: login_menu.php"); 
              }
              else if ( $user_level === 'ULLAGINGCHECK' )
              {
                 header("location: login_menu.php");   
              }
              else if ( $user_level === 'INVOICECHECK' )
              {
                 header("location: login_menu.php");  
              }
              else if ( $user_level === 'TERMINALEXITCHECK' )
              {
                 header("location: login_menu.php"); 
              }
              else if ( $user_level === 'ADMIN' )
              {
                header("location: login_menu.php");   
              } 
          }          
          } else {
              header("location: index.php");
         }
        $db_con->close(); // Closing Connection           
     }
}

?>