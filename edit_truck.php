<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD'] === "GET"){
 
    if(!empty ($_GET['serialnumber'])){
        
       $serialno = mysqli_real_escape_string($db_con, $_GET['serialnumber']);
       $query = "SELECT SNO,TRUCKNO,TRANSPORTER,DRIVERNAME,CAPACITY,PRODUCT,BDC,ENTRYDATE "
              . "FROM tsl_truck_load WHERE SNO='$serialno' ORDER BY 1 DESC LIMIT 1";
       $result = $db_con->query($query);
       
         while($row = $result->fetch_assoc()) {
             $truknumber = $row['TRUCKNO'];
             $transporter = $row['TRANSPORTER'];
             $drivername = $row['DRIVERNAME'];
             $capacity = $row['CAPACITY'];
             $product = $row['PRODUCT'];
             $bdc = $row['BDC'];
             $entrydate = $row['ENTRYDATE'];
             
             $data = array('truckno' => $truknumber, 'transporter' => $transporter, 'drivername' => $drivername
                     ,'capacity' => $capacity, 'product' => $product, 'bdc' =>$bdc, 'entrydate' => $entrydate);
          
             echo json_encode($data);
            
         }
         $db_con->close();    
     }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if(!empty($_POST['etrucknumber']) && !empty($_POST['etrucktransporter']) && !empty($_POST['etruckdriver']) && !empty($_POST['etruckcapacity'])
         && !empty($_POST['etruckproduct']) && !empty($_POST['etruckbdc']) && !empty($_POST['modifieddate'])){
       
        $e_entrytype = mysqli_real_escape_string($db_con, $_POST['entrytype']);
        $ewaybillno = mysqli_real_escape_string($db_con, $_POST['waybillno']);
        $collectionorder = mysqli_real_escape_string($db_con, $_POST['collectionoder']);
        $ectrfrom = mysqli_real_escape_string($db_con, $_POST['countryfrom']);
        $edepotfrom =  mysqli_real_escape_string($db_con, $_POST['depotfrom']);
        $ectrto =  mysqli_real_escape_string($db_con, $_POST['countryto']); 
        $edepotto = mysqli_real_escape_string($db_con, $_POST['depotto']);
        $eomctype = mysqli_real_escape_string($db_con, $_POST['omctype']);
        $eomcdest = mysqli_real_escape_string($db_con, $_POST['omcdest']);
        
        $eserialnumber = mysqli_real_escape_string($db_con, $_POST['eserialnum']);
        $etrucknumber = mysqli_real_escape_string($db_con, $_POST['etrucknumber']);
        $etransporter = mysqli_real_escape_string($db_con, $_POST['etrucktransporter']);
        $etruckdriver = mysqli_real_escape_string($db_con, $_POST['etruckdriver']);
        $etruckcapacity = mysqli_real_escape_string($db_con, $_POST['etruckcapacity']);
        $etruckproduct = mysqli_real_escape_string($db_con, $_POST['etruckproduct']);
        $etruckbdc = mysqli_real_escape_string($db_con, $_POST['etruckbdc']);
        $egenbarcode = mysqli_real_escape_string($db_con, $_POST['egenbarcode']);
        $genbarcodedate = date('Y-m-d H:i:s');
        $modifieddate = date('Y-m-d H:i:s');
        $modifiedby = mysqli_real_escape_string($db_con, $_SESSION['login_user_name']);
        
        $sql = "UPDATE tsl_truck_load SET TRUCKNO='$etrucknumber', TRANSPORTER='$etransporter', DRIVERNAME='$etruckdriver', "
                . " CAPACITY='$etruckcapacity', PRODUCT='$etruckproduct', BDC='$etruckbdc', GENBARCODE='$egenbarcode', "
                . " GENBARCODEDATE='$genbarcodedate' ,MODIFIEDBY='$modifiedby', MODIFIEDDATE='$modifieddate', "
                . " `ENTRY_TYPE`='$e_entrytype', `WAYBILL_NO`='$ewaybillno', `COLLECTION_ORDER_NO`='$collectionorder', "
                . " `COUNTRY_LIFTED_FROM`='$ectrfrom',`COUNTRY_LIFTED_TO`='$ectrto', `DEPOT_LIFTED_FROM`='$edepotfrom', "
                . " `DEPOT_LIFTED_TO`='$edepotto' ,`OMC_TYPE`='$eomctype' ,`OMC_DESTINATION`='$eomcdest' "
                . " WHERE SNO='$eserialnumber'";

        if ($db_con->query($sql) === TRUE) {
            echo $data = '1';
        } else {
            echo $data = '0';
        }   
        $db_con->close();
        
    }   
}


?>