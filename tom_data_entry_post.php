<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>
<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
if(isset($_POST['ctr'])){
    
    $ctrcode = mysqli_real_escape_string($db_con, $_POST['ctr_code']);
    $ctrname = mysqli_real_escape_string($db_con, $_POST['ctr_name']);
    $ctrdescription = mysqli_real_escape_string($db_con, $_POST['ctr_description']);
    
    $user_name = $_SESSION['login_user_name'];
    $query = "INSERT INTO `tsl_country`(`Country_Code`, `Country_Name`, `Description`, `CreatedBy`) "
           . "VALUES ('$ctrcode','$ctrname','$ctrdescription','$user_name')";
    
    if ($db_con->query($query) === TRUE) 
        {
          echo $data = 'New record successfully saved.';                               
        } else {
          echo $data = 'error';
        }
       $db_con->close();
    
}      
    
    
    
}


?>