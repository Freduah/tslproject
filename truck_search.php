<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>
<?php

echo "<div id='mydiv'>";
if($_SERVER['REQUEST_METHOD'] === 'GET') {
if(!empty ($_GET['trucknumber'])){
        
        $truck_number =  $_GET['trucknumber'];
      
        $query = "SELECT SNO,TRUCKNO,TRANSPORTER,DRIVERNAME,CAPACITY,PRODUCT,BDC,DATEGENERATED "
                . "FROM tsl_truck_load WHERE TRUCKNO='$truck_number' ORDER BY 1 DESC LIMIT 2";
        $result = $db_con->query($query);

        echo "<table id='tbl_truck_entry' style='margin-left:auto; margin-right:auto; color:blue;'>
        <thead>
          <tr>
            <th data-priority='1'>SNO</th>
            <th data-priority='2'>TRUCK NO</th>
            <th data-priority='3'>TRANSPORTER</th>
            <th data-priority='4'>DRIVER NAME</th>
            <th data-priority='6'>CAPACITY</th>
            <th data-priority='7'>PRODUCT</th>
            <th data-priority='8'>BDC</th>
            <th data-priority='9'>ENTRY DATE</th>
          </tr>
        </thead>
        <tbody>";
          while($row = $result->fetch_assoc()) {
           echo " <tr> ";
           echo " <td>" . $row['SNO'] . "</td>";
           echo " <td>" . $row['TRUCKNO'] . "</td>";
           echo " <td>" . $row['TRANSPORTER'] . "</td>";
           echo " <td>" . $row['DRIVERNAME'] . "</td>";
           echo " <td>" . $row['CAPACITY'] . "</td>";
           echo " <td>" . $row['PRODUCT'] . "</td>";
           echo " <td>" . $row['BDC'] . "</td>";
           echo " <td>" . $row['DATEGENERATED'] . "</td>";
           echo " </tr> "; 
          }

         echo "</tbody>
        </table>";

        $db_con->close();        
    }  
}  

echo "</div>";
    