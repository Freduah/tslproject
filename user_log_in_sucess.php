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
            
              $user_level =  $row['UserLevel'];   
              
              if ( $user_level === 'DATAENTRY' ){
                header("location: truck_load_data_entry.php"); // Redirecting To Truck Data Entry                    
              } 
              else if ( $user_level === 'MARSHALING' ){
                header("location: marshaling_area_check.php"); // Redirecting To Marshaling Area                   
              } else if ( $user_level === 'SAFETYCHECK' )
              {
                header("location: safety_check.php"); // Redirecting To Truck Safety Check  
              }
               else if ( $user_level === 'SAFETYCHECKMANUAL' )
              {
                header("location: safety_manual_check.php"); // Redirecting To Truck Safety Check  
              }
              else if ( $user_level === 'TERMINALENTRYCHECK' )
              {
                header("location: terminal_entry_check.php"); // Redirecting To Terminal Entry Check  
              }
              else if ( $user_level === 'GANTRYCHECK' )
              {
                header("location: gantry_check.php"); // Redirecting To Gantry Area Check 
              }
              else if ( $user_level === 'ULLAGINGCHECK' )
              {
                header("location: ullaging_area_check.php"); // Redirecting To Ullagin Area Check   
              }
              else if ( $user_level === 'INVOICECHECK' )
              {
                header("location: invoice_check.php"); // Redirecting To Invoicing Check   
              }
              else if ( $user_level === 'TERMINALEXITCHECK' )
              {
                header("location: terminal_exit_check.php"); // Redirecting To Terminal Exit Check   
              }
              else if ( $user_level === 'ADMIN' )
              {
                header("location: login_menu.php"); // Redirecting To Terminal Exit Check   
              } 
          }          
          } else {
              header("location: login.php");
         }
        $db_con->close(); // Closing Connection           
     }
}

?>