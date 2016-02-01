<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>

<?php


if($_SERVER['REQUEST_METHOD'] === 'POST') {
     
     if(!empty($_SESSION['login_user_name']))
     {
      $serial_number = mysqli_real_escape_string($db_con, $_POST['serialno']);   
      $user_name = $_SESSION['login_user_name'];
      $query = "SELECT `SNO`, `ENTRY_TYPE`, `WAYBILL_NO`, `COLLECTION_ORDER_NO`, `TRUCKNO`, `TRANSPORTER`, "
              . " `DRIVERNAME`, `CAPACITY`, `PRODUCT`, `BDC`, `COUNTRY_LIFTED_FROM`, `COUNTRY_LIFTED_TO`, "
              . " `DEPOT_LIFTED_FROM`, `DEPOT_LIFTED_TO`, `OMC_TYPE`, `OMC_DESTINATION`, `ENTRYDATE` "
              . " FROM `tsl_truck_load` WHERE `SNO` = '$serial_number'";
              
      $result = $db_con->query($query);
      while($data = $result->fetch_assoc()) {
          echo json_encode($data);  
      }      
      
      $db_con->close(); 
     }
}