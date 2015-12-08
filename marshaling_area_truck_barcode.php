<?php session_start(); ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>

    
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if(!empty($_POST['marshaling_barcode'])){
        
        $marshalbarcode = mysqli_real_escape_string($db_con, $_POST['marshaling_barcode']);
        $marshalbarcodedate = date('Y-m-d H:i:s');
        $marshaluser = $_SESSION['login_user_name'];
        
        $sql = "UPDATE tsl_truck_load SET MAR_BARCODE_CHECK='$marshalbarcode', MAR_BARCODE_CHECK_DATE='$marshalbarcodedate' "
                . ",MAR_BCODE_CHECKED_BY='$marshaluser' WHERE GENBARCODE='$marshalbarcode'";

        if ($db_con->query($sql) === TRUE) {
            echo $data = $marshalbarcode;
        } else {
            echo $data =  $db_con->error;
        }   
        $db_con->close();
        
        
        
    }
       
}

?>

