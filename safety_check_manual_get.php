<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD'] === "GET"){
 
    if(!empty ($_GET['serialno']) && !empty($_GET['truckno'])){
        
       $serialno = mysqli_real_escape_string($db_con, $_GET['serialno']);
       $truckno = mysqli_real_escape_string($db_con, $_GET['truckno']);
       $query = "SELECT SNO,TRUCKNO FROM tsl_truck_load WHERE SNO='$serialno' "
               . " AND TRUCKNO='$truckno' ORDER BY 1 DESC LIMIT 1";
       $result = $db_con->query($query);
       
         while($row = $result->fetch_assoc()) {
             $truknumber = $row['TRUCKNO'];
             $serialnum = $row['SNO'];
             $data = array('truckno' => $truknumber, 'serialnum' => $serialnum);
          
             echo json_encode($data);
            
         }
         $db_con->close();    
     }
} else if($_SERVER['REQUEST_METHOD'] === "POST"){
 
    if(!empty ($_POST['truknumber']) && !empty($_POST['serialnumber'])){
        
       $serialno = mysqli_real_escape_string($db_con, $_POST['serialnumber']);
       $truckno = mysqli_real_escape_string($db_con, $_POST['truknumber']);
       $has_pass_safety = $_POST['pass_safety'];
       $rejectionreason = mysqli_real_escape_string($db_con, $_POST['rejectionreason']);
       $query_comments = mysqli_real_escape_string($db_con, $_POST['query_comments']);
       $curr_date = date('Y-m-d H:i:s');
       
       $query = "UPDATE tsl_truck_load SET HASPASSEDSAFETY='$has_pass_safety', "
               . " PASSEDSAFETYDATE='$curr_date', REJECTIONREASON='$rejectionreason', QUERYCOMMENTS='$query_comments' "
               . " WHERE SNO='$serialno'  AND TRUCKNO='$truckno' ";
       
         if ($db_con->query($query) === TRUE) {
            echo $data  = '1';
         } else {
            echo $data = '-1';
         }
         $db_con->close();    
     }
} 


