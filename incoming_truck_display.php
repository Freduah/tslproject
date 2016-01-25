<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>

<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">	
       
        <div id="tom_watch_stats" class="clearfix row">
            
            <table style="width: 94%; font-size: large ;">
                <tr>
                    <td>
                        <div id="incoming-display-pms">                                                       
                            <?php 
                                $entry_date = date('Y-m-d H:i:s');
                                $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id,t.TRUCKNO,t.CAPACITY, t.BDC, TIME(t.ENTRYDATE) as ORDERTIME, "
                                         . "t.PRODUCT, t.HASPASSEDSAFETY FROM tsl_truck_load AS t, "
                                         . "(SELECT @i:=0) AS foo WHERE DATE(t.ENTRYDATE)=DATE('$entry_date') "
                                         . " AND t.PRODUCT = 'PMS' ORDER BY t.ENTRYDATE DESC LIMIT 10";

                            $data_entry_result = $db_con->query($query);

                                echo "<table id='tbl_incoming_pms' style='margin-left:auto; margin-right:auto; background-color:blue; color:white;'>
                               <thead>
                                 <tr>
                                   <th data-priority='1'></th>
                                   <th data-priority='2'>TRUCK NO</th>
                                   <th data-priority='3'>CAPACITY</th>
                                   <th data-priority='4'>PRODUCT</th>
                                   <th data-priority='5'>BDC</th>
                                   <th data-priority='6'>TIME</th>
                                   <th data-priority='7'>SAFE</th>
                                 </tr>
                               </thead>
                               <tbody style='color:black;'>";
                                 while($row = $data_entry_result->fetch_assoc()) {
                                  echo " <tr> ";
                                  echo " <td>" . $row['ROWNUM'] . "</td>";
                                  echo " <td>" . $row['TRUCKNO'] . "</td>";
                                  echo " <td>" . $row['CAPACITY'] . "</td>";
                                  echo " <td>" . $row['PRODUCT'] . "</td>";
                                  echo " <td>" . $row['BDC'] . "</td>";
                                  echo " <td>" . $row['ORDERTIME'] . "</td>";
                                  echo " <td>" . $row['HASPASSEDSAFETY'] . "</td>";
                                  echo " </tr> "; 
                                 }

                                echo "</tbody>
                              </table>";                                                        
                               // $db_con->close(); 
                             ?>
                        </div>                        
                    </td>
                    
                    <td>
                      <div id="incoming-display-ago">                          
                            <?php 
                             $safety_date = date('Y-m-d H:i:s');
                             $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id, t.SNO,t.TRUCKNO,t.CAPACITY, t.BDC, TIME(t.ENTRYDATE) as ORDERTIME, "
                                      . "t.PRODUCT, t.HASPASSEDSAFETY FROM tsl_truck_load AS t, "
                                      . "(SELECT @i:=0) AS foo WHERE DATE(t.ENTRYDATE)=DATE('$safety_date') "
                                      . " AND t.PRODUCT='AGO' ORDER BY t.ENTRYDATE DESC LIMIT 10";

                            $safety_result = $db_con->query($query);

                                echo "<table id='tbl_incoming_ago' style='margin-left:auto; margin-right:auto; background-color:yellow;'>
                               <thead>
                                 <tr>
                                   <th data-priority='1'></th>
                                   <th data-priority='2'>TRUCK NO</th>
                                   <th data-priority='3'>CAPACITY</th>
                                   <th data-priority='4'>PRODUCT</th>
                                   <th data-priority='5'>BDC</th>
                                   <th data-priority='6'>TIME</th>
                                   <th data-priority='7'>SAFE</th>
                                 </tr>
                               </thead>
                               <tbody style='color:black;'>";
                                 while($row = $safety_result->fetch_assoc()) {
                                  echo " <tr> ";
                                  echo " <td>" . $row['ROWNUM'] . "</td>";
                                  echo " <td>" . $row['TRUCKNO'] . "</td>";
                                  echo " <td>" . $row['CAPACITY'] . "</td>";
                                  echo " <td>" . $row['PRODUCT'] . "</td>";
                                  echo " <td>" . $row['BDC'] . "</td>";
                                  echo " <td>" . $row['ORDERTIME'] . "</td>";
                                  echo " <td>" . $row['HASPASSEDSAFETY'] . "</td>";
                                  echo " </tr> "; 
                                 }

                                echo "</tbody>
                              </table>";                                            
                
                                //$db_con->close(); 
                             ?>
                      </div>                     
                        
                    </td>                   
                </tr>                
            </table>
            
             
            
            
            
             
            
        </div>       
        
    </div>
  </div>
</div>    



<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>


<script>

$(document).ready(function(){
    
  setInterval(function(){
    location.reload();
  },10000);

$('#tbl_incoming_pms th:nth-child(7)').hide();
$('#tbl_incoming_pms td:nth-child(7)').hide();  
$("#tbl_incoming_pms td").each(function () {

	var issafe = $(this).closest('tr').find('td:eq(6)').text();
	console.log("Has pass safety :" + issafe);
	
	if (issafe === 'Y') {
          $(this).css('background-color', 'lightgreen');
	} else if (issafe === 'N') {
          $(this).css('background-color', 'lightgrey');  
	} else if (issafe === '') {
          $(this).css('background-color', '#d9534f');  
	}
});



$('#tbl_incoming_ago th:nth-child(7)').hide();
$('#tbl_incoming_ago td:nth-child(7)').hide(); 
$("#tbl_incoming_ago td").each(function () {

	var passed = $(this).closest('tr').find('td:eq(6)').text();
	
	
	if (passed === 'Y') {
          $(this).css('background-color', 'lightgreen');
	} else if (passed === 'N') {
          $(this).css('background-color', 'lightgrey');  
	} else if (passed === '') {
          $(this).css('background-color', '#d9534f');  
	}
});

});

</script>