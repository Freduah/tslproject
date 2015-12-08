<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>

<?php  
if($_SERVER['REQUEST_METHOD'] === "GET"){
    
    if(!empty($_GET['add_truck_bdc'])){

    $query = "SELECT * FROM `tsl_bdc`";
    $result = $db_con->query($query);
     while($row = $result->fetch_assoc()) {

     $data = $row['bdcCode'];                            
        echo $data;  
     }       
         
    //$db_con->close(); 
    }
    
}

                               