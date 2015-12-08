<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/admin/db_con_admin.php'; ?>
<?php


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if(!empty($_POST['login_user']) && !empty($_POST['login_password']) ) {
     $user_name =  mysqli_real_escape_string($db_con,$_POST['login_user']);
     $user_password = md5(mysqli_real_escape_string($db_con,$_POST['login_password']));     
    
      $query = "SELECT * FROM  tsl_admin WHERE admin_user='$user_name' AND admin_pass='$user_password'";
        $result = $db_con->query($query);
        if ($result->num_rows === 1) {
            $_SESSION['admin_user'] = $user_name;
          header("location: activate_user.php"); // Redirecting To Other Page
          } else {
              header("location: index.php");
         }
        $db_con->close(); // Closing Connection     
    } 
}



?>