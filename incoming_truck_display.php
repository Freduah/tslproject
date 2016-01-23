<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/nav/incoming_truck_display_nav.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>

<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">	
        
        <div id="tom_watch_stats" class="clearfix row">
            <div id="tom-watch-data-display-incoming-trucks">
                    <?php 
                                $entry_date = date('Y-m-d H:i:s');
                                $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id,t.TRUCKNO,t.CAPACITY, "
                                         . "t.PRODUCT, t.HASPASSEDSAFETY FROM tsl_truck_load AS t, "
                                         . "(SELECT @i:=0) AS foo WHERE DATE(t.ENTRYDATE)=DATE('$entry_date') ORDER BY t.ENTRYDATE DESC LIMIT 15";

                            $data_entry_result = $db_con->query($query);

                                echo "<table id='tbl_data_entry_watch' style='margin-left:auto; margin-right:auto;'>
                               <thead>
                                 <tr>
                                   <th data-priority='1'>NO</th>
                                   <th data-priority='2'>TRUCK NO</th>
                                   <th data-priority='3'>CAPACITY</th>
                                   <th data-priority='4'>PRODUCT</th>
                                   <th data-priority='5'>Passed?</th>
                                   <th data-priority='6'></th>
                                 </tr>
                               </thead>
                               <tbody style='color:white;'>";
                                 while($row = $data_entry_result->fetch_assoc()) {
                                  echo " <tr> ";
                                  echo " <td>" . $row['ROWNUM'] . "</td>";
                                  echo " <td>" . $row['TRUCKNO'] . "</td>";
                                  echo " <td>" . $row['CAPACITY'] . "</td>";
                                  echo " <td>" . $row['PRODUCT'] . "</td>";
                                  echo " <td>" . $row['HASPASSEDSAFETY'] . "</td>";
                                  echo " <td> <input type=button id='btn_print' value='View'></button></td>";
                                  echo " </tr> "; 
                                 }

                                echo "</tbody>
                              </table>";                                                        
                               // $db_con->close(); 
                             ?>                      
            </div>           
        </div>       
        
    </div>
  </div>
</div>    



<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>

  