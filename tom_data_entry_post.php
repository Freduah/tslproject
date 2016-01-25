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
    
} else if(isset($_POST['bdc'])){
    $bdc_code = mysqli_real_escape_string($db_con,$_POST['dbccode']);
    $bdc_name = mysqli_real_escape_string($db_con,$_POST['bdcname']);
    $bdc_ctr = mysqli_real_escape_string($db_con,$_POST['bdcctr']);
    $bdc_desc = mysqli_real_escape_string($db_con,$_POST['bdcdesc']);
    
    $user_name = $_SESSION['login_user_name'];
    $query = "INSERT INTO `tsl_bdc`(`bdcCode`, `bdcName`, `country_code`, `Description`, `createdBy`) "
            . " VALUES ('$bdc_code','$bdc_name','$bdc_ctr','$bdc_desc','$user_name')";
    
    
    if ($db_con->query($query) === TRUE) 
        {
          echo $data = 'New record successfully saved.';                               
        } else {
          echo $data = 'error';
        }
       $db_con->close();
    
} else if(isset ($_POST['depot'])){
    $depot_code = mysqli_real_escape_string($db_con, $_POST['depotcode']);
    $depot_name = mysqli_real_escape_string($db_con, $_POST['depotname']);
    $depot_ctr = mysqli_real_escape_string($db_con, $_POST['depotctr']);
    $depot_desc = mysqli_real_escape_string($db_con, $_POST['depotdesc']);
    
    $user_name = $_SESSION['login_user_name'];
    $query = "INSERT INTO `tsl_depot`(`DepotCode`, `Country_Code`, `DepotName`, `Description`, `CreatedBy`) "
            . "VALUES ('$depot_code','$depot_name','$depot_ctr','$depot_desc','$user_name')";
    
    
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