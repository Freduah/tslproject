<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/nav/tom_watch_nav.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>

<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">	
       
        <div id="tom_watch_stats" class="clearfix row">
            
            <table>
                <tr>
                    <td>
                        <div id="tom-watch-data-scroll">
                            <label>Data Entry</label>
                            
                            <?php 
                                $curr_date = date('Y-m-d H:i:s');
                                $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id, t.SNO,t.TRUCKNO,t.CAPACITY, "
                                         . "t.PRODUCT FROM tsl_truck_load AS t, "
                                         . "(SELECT @i:=0) AS foo WHERE DATE(t.ENTRYDATE)=DATE('$curr_date') ORDER BY t.ENTRYDATE DESC LIMIT 15";

                            $result = $db_con->query($query);

                            while($row = $result->fetch_assoc()) {

                                echo "<table id='tbl_truck_entry' style='margin-left:auto; margin-right:auto;'>
                               <thead>
                                 <tr>
                                   <th data-priority='1'>NO</th>
                                   <th data-priority='1'>SNO</th>
                                   <th data-priority='2'>TRUCK NO</th>
                                   <th data-priority='3'>CAPACITY</th>
                                   <th data-priority='3'>PRODUCT</th>
                                   <th data-priority='9'></th>
                                 </tr>
                               </thead>
                               <tbody>";
                                 while($row = $result->fetch_assoc()) {
                                  echo " <tr> ";
                                  echo " <td>" . $row['ROWNUM'] . "</td>";
                                  echo " <td>" . $row['SNO'] . "</td>";
                                  echo " <td>" . $row['TRUCKNO'] . "</td>";
                                  echo " <td>" . $row['CAPACITY'] . "</td>";
                                  echo " <td>" . $row['PRODUCT'] . "</td>";
                                  echo " <td> <input type=button id='btn_print' value='View'></button></td>";
                                  echo " </tr> "; 
                                 }

                                echo "</tbody>
                              </table>";                                            

                                }                  
                               // $db_con->close(); 
                             ?>
                        </div>                        
                    </td>
                    
                    <td>
                      <div id="tom-watch-safety-scroll">
                          <label>Safety Check</label>
                            
                            <?php 
                             $curr_date = date('Y-m-d H:i:s');
                             $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id, t.SNO,t.TRUCKNO,t.CAPACITY, "
                                      . "t.PRODUCT FROM tsl_truck_load AS t, "
                                      . "(SELECT @i:=0) AS foo WHERE DATE(t.ENTRYDATE)=DATE('$curr_date') AND t.HASPASSEDSAFETY='Y'  ORDER BY t.ENTRYDATE DESC LIMIT 15";

                            $result = $db_con->query($query);

                            while($row = $result->fetch_assoc()) {

                                echo "<table id='tbl_truck_entry' style='margin-left:auto; margin-right:auto;'>
                               <thead>
                                 <tr>
                                   <th data-priority='1'>NO</th>
                                   <th data-priority='1'>SNO</th>
                                   <th data-priority='2'>TRUCK NO</th>
                                   <th data-priority='3'>CAPACITY</th>
                                   <th data-priority='3'>PRODUCT</th>
                                   <th data-priority='9'></th>
                                 </tr>
                               </thead>
                               <tbody>";
                                 while($row = $result->fetch_assoc()) {
                                  echo " <tr> ";
                                  echo " <td>" . $row['ROWNUM'] . "</td>";
                                  echo " <td>" . $row['SNO'] . "</td>";
                                  echo " <td>" . $row['TRUCKNO'] . "</td>";
                                  echo " <td>" . $row['CAPACITY'] . "</td>";
                                  echo " <td>" . $row['PRODUCT'] . "</td>";
                                  echo " <td> <input type=button id='btn_print' value='View'></button></td>";
                                  echo " </tr> "; 
                                 }

                                echo "</tbody>
                              </table>";                                            

                                }                  
                                //$db_con->close(); 
                             ?>
                      </div>                     
                        
                    </td>
                    
                    <td>
                      <div id="tom-watch-invoice-scroll">
                          <label>Invoice</label>
                          
                           <?php 
                             $curr_date = date('Y-m-d H:i:s');
                             $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id, t.SNO,t.TRUCKNO,t.CAPACITY, "
                                      . "t.PRODUCT FROM tsl_truck_load AS t, "
                                      . "(SELECT @i:=0) AS foo WHERE DATE(t.ENTRYDATE)=DATE('$curr_date') AND t.HASPASSEDSAFETY='Y'  ORDER BY t.ENTRYDATE DESC LIMIT 15";

                            $result = $db_con->query($query);

                            while($row = $result->fetch_assoc()) {

                                echo "<table id='tbl_truck_entry' style='margin-left:auto; margin-right:auto;'>
                               <thead>
                                 <tr>
                                   <th data-priority='1'>NO</th>
                                   <th data-priority='1'>SNO</th>
                                   <th data-priority='2'>TRUCK NO</th>
                                   <th data-priority='3'>CAPACITY</th>
                                   <th data-priority='3'>PRODUCT</th>
                                   <th data-priority='9'></th>
                                 </tr>
                               </thead>
                               <tbody>";
                                 while($row = $result->fetch_assoc()) {
                                  echo " <tr> ";
                                  echo " <td>" . $row['ROWNUM'] . "</td>";
                                  echo " <td>" . $row['SNO'] . "</td>";
                                  echo " <td>" . $row['TRUCKNO'] . "</td>";
                                  echo " <td>" . $row['CAPACITY'] . "</td>";
                                  echo " <td>" . $row['PRODUCT'] . "</td>";
                                  echo " <td> <input type=button id='btn_print' value='View'></button></td>";
                                  echo " </tr> "; 
                                 }

                                echo "</tbody>
                              </table>";                                            

                                }                  
                                $db_con->close(); 
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