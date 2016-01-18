<?php session_start();  ?>
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
                            <div id="tom-watch-data-stats">
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;"> <label>Data Stats :</label>
                                             <?php
                                                if($_SERVER['REQUEST_METHOD'] === 'GET'){
                                                     if(!empty($_SESSION['login_user_name'])){

                                                        $user_name = $_SESSION['login_user_name'];
                                                        $currDate = date("Y-m-d");

                                                        $numoftrucks = "SELECT * FROM `tsl_truck_load` WHERE DATE(ENTRYDATE) ='$currDate' ";
                                                        $bostresults = "SELECT * FROM `tsl_truck_load` WHERE DATE(ENTRYDATE) ='$currDate' AND BDC='BOST' ";
                                                        $bdcresults = "SELECT * FROM `tsl_truck_load` WHERE DATE(ENTRYDATE) ='$currDate' AND BDC!='BOST' ";
                                                        
                                                        $super_result = "SELECT * FROM `tsl_truck_load` WHERE DATE(ENTRYDATE) ='$currDate' AND PRODUCT='SUPER' ";
                                                        $ago_result = "SELECT * FROM `tsl_truck_load` WHERE DATE(ENTRYDATE) ='$currDate' AND PRODUCT='AGO' ";
                                                        $kero_result = "SELECT * FROM `tsl_truck_load` WHERE DATE(ENTRYDATE) ='$currDate' AND PRODUCT!='KERO' ";
                                                         
                                                        $totnumtrucks = mysqli_num_rows($db_con->query($numoftrucks));
                                                        $numoftrucksbost = mysqli_num_rows($db_con->query($bostresults));
                                                        $numoftrucksbdc = mysqli_num_rows($db_con->query($bdcresults));
                                                        
                                                        $tot_super = mysqli_num_rows($db_con->query($super_result));
                                                        $tot_ago = mysqli_num_rows($db_con->query($ago_result));
                                                        $tot_kero = mysqli_num_rows($db_con->query($kero_result));
                                                                

                                                        echo "<label>Total Entry: $totnumtrucks  => Trucks By ( BOST: $numoftrucksbost  BDC: $numoftrucksbdc )</label>";
                                                        echo "<label>Products  => ( SUPER: $tot_super  AGO: $tot_ago  KERO: $tot_kero )</label>";
                                                        //$db_con->close();                 
                                                     }           
                                                }
                                                ?>   
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
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
                    </td>
                    
                    <td>
                      <div id="tom-watch-safety-scroll">
                          <div id="tom-watch-safety-check">
                             <table>
                                    <tr>
                                        <td style="font-weight: bold;"><label>Safety Stats : </label>
                                             <?php
                                                if($_SERVER['REQUEST_METHOD'] === 'GET'){
                                                     if(!empty($_SESSION['login_user_name'])){

                                                        $user_name = $_SESSION['login_user_name'];
                                                        $currDate = date("Y-m-d");

                                                        $numoftrucks = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' ";
                                                        $bostresults = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND BDC='BOST' ";
                                                        $bdcresults = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND BDC!='BOST' ";
                                                        
                                                        $totnumtrucks = mysqli_num_rows($db_con->query($numoftrucks));
                                                        $numoftrucksbost = mysqli_num_rows($db_con->query($bostresults));
                                                        $numoftrucksbdc = mysqli_num_rows($db_con->query($bdcresults));
                                                        
                                                        $super_result = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND PRODUCT='SUPER' ";
                                                        $ago_result = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND PRODUCT='AGO' ";
                                                        $kero_result = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND PRODUCT='KERO' ";
                                                         
                                                                                                               
                                                        $tot_super = mysqli_num_rows($db_con->query($super_result));
                                                        $tot_ago = mysqli_num_rows($db_con->query($ago_result));
                                                        $tot_kero = mysqli_num_rows($db_con->query($kero_result));
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        echo "<label>Total Entry: $totnumtrucks  => Trucks By ( BOST: $numoftrucksbost  BDC: $numoftrucksbdc )</label>";
                                                        echo "<label>Products  => ( SUPER: $tot_super  AGO: $tot_ago  KERO: $tot_kero )</label>";
                                                        
                                                        //$db_con->close();                 
                                                     }           
                                                }
                                                ?>   
                                        </td>
                                        <td style="font-weight: bold;"> Rejection Stats :
                                            <?php 
                                            
                                                $super_passed = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND HASPASSEDSAFETY='Y' AND PRODUCT='SUPER' ";
                                                $ago_passed = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND HASPASSEDSAFETY='Y' AND PRODUCT='AGO' ";
                                                $kero_passed = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND HASPASSEDSAFETY='Y' AND PRODUCT='KERO' ";

                                                $tot_super_passed = mysqli_num_rows($db_con->query($super_passed));
                                                $tot_ago_passed = mysqli_num_rows($db_con->query($ago_passed));
                                                $tot_kero_passed = mysqli_num_rows($db_con->query($kero_passed));
                                                
                                                $super_rejected = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND HASPASSEDSAFETY='N' AND PRODUCT='SUPER' ";
                                                $ago_rejected = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND HASPASSEDSAFETY='N' AND PRODUCT='AGO' ";
                                                $kero_rejected = "SELECT * FROM `tsl_truck_load` WHERE DATE(PASSEDSAFETYDATE) ='$currDate' AND HASPASSEDSAFETY='N' AND PRODUCT='KERO' ";

                                                $tot_super_rejected = mysqli_num_rows($db_con->query($super_rejected));
                                                $tot_ago_rejected = mysqli_num_rows($db_con->query($ago_rejected));
                                                $tot_kero_rejected = mysqli_num_rows($db_con->query($kero_rejected));
                                                                
                                                echo "<label>Passed  => ( SUPER: $tot_super_passed  AGO: $tot_ago_passed  KERO: $tot_kero_passed )</label>";
                                                echo "<label>Rejected  => ( SUPER: $tot_super_rejected  AGO: $tot_ago_rejected  KERO: $tot_kero_rejected )</label>";
                                            ?>
                                            
                                            
                                        </td>
                                    </tr>
                                </table> 
                          </div>
                            
                            <?php 
                             $safety_date = date('Y-m-d H:i:s');
                             $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id, t.SNO,t.TRUCKNO,t.CAPACITY, "
                                      . "t.PRODUCT, t.HASPASSEDSAFETY FROM tsl_truck_load AS t, "
                                      . "(SELECT @i:=0) AS foo WHERE DATE(t.PASSEDSAFETYDATE)=DATE('$safety_date') ORDER BY t.PASSEDSAFETYDATE DESC LIMIT 15";

                            $safety_result = $db_con->query($query);

                                echo "<table id='tbl_safety_watch' style='margin-left:auto; margin-right:auto;'>
                               <thead>
                                 <tr>
                                   <th data-priority='1'>NO</th>
                                   <th data-priority='2'>TRUCK NO</th>
                                   <th data-priority='3'>CAPACITY</th>
                                   <th data-priority='4'>PRODUCT</th>
                                   <th data-priority='5'>Passed?</th>
                                   <th data-priority='5'></th>
                                 </tr>
                               </thead>
                               <tbody style='color:white;'>";
                                 while($row = $safety_result->fetch_assoc()) {
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
                
                                //$db_con->close(); 
                             ?>
                      </div>                     
                        
                    </td>
                    
                    <td>
                      <div id="tom-watch-invoice-scroll">
                          <div id="tom-watch-invoice-stats">
                              <table>
                                    <tr>
                                        <td style="font-weight: bold;"> <label>Invoice Stats :</label>
                                             <?php
                                                if($_SERVER['REQUEST_METHOD'] === 'GET'){
                                                     if(!empty($_SESSION['login_user_name'])){

                                                        $user_name = $_SESSION['login_user_name'];
                                                        $currDate = date("Y-m-d");

                                                        $numoftrucks = "SELECT * FROM `tsl_truck_load` WHERE DATE(INVOICE_CHECK_DATE) ='$currDate' ";
                                                        $bostresults = "SELECT * FROM `tsl_truck_load` WHERE DATE(INVOICE_CHECK_DATE) ='$currDate' AND BDC='BOST' ";
                                                        $bdcresults = "SELECT * FROM `tsl_truck_load` WHERE DATE(INVOICE_CHECK_DATE) ='$currDate' AND BDC!='BOST' ";
                                                       
                                                        $totnumtrucks = mysqli_num_rows($db_con->query($numoftrucks));
                                                        $numoftrucksbost = mysqli_num_rows($db_con->query($bostresults));
                                                        $numoftrucksbdc = mysqli_num_rows($db_con->query($bdcresults));
                                                        
                                                        $super_result = "SELECT * FROM `tsl_truck_load` WHERE DATE(INVOICE_CHECK_DATE) ='$currDate' AND PRODUCT='SUPER' ";
                                                        $ago_result = "SELECT * FROM `tsl_truck_load` WHERE DATE(INVOICE_CHECK_DATE) ='$currDate' AND PRODUCT='AGO' ";
                                                        $kero_result = "SELECT * FROM `tsl_truck_load` WHERE DATE(INVOICE_CHECK_DATE) ='$currDate' AND PRODUCT='KERO' ";
                                                         
                                                                                                               
                                                        $tot_super = mysqli_num_rows($db_con->query($super_result));
                                                        $tot_ago = mysqli_num_rows($db_con->query($ago_result));
                                                        $tot_kero = mysqli_num_rows($db_con->query($kero_result));

                                                        echo "<label>Total Entry: $totnumtrucks  => Trucks By ( BOST: $numoftrucksbost  BDC: $numoftrucksbdc )</label>";
                                                        echo "<label>Products  => ( SUPER: $tot_super  AGO: $tot_ago  KERO: $tot_kero )</label>";
                                                        //$db_con->close();                 
                                                     }           
                                                }
                                                ?>   
                                        </td>
                                    </tr>
                                </table> 
                          </div>
                          
                           <?php 
                             $invoice_date = date('Y-m-d H:i:s');
                             $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id, t.SNO,t.TRUCKNO,t.CAPACITY, "
                                      . "t.PRODUCT FROM tsl_truck_load AS t, "
                                      . "(SELECT @i:=0) AS foo WHERE DATE(t.INVOICE_CHECK_DATE)=DATE('$invoice_date') ORDER BY TIME(t.INVOICE_CHECK_DATE) DESC LIMIT 15";

                            $invoice_result = $db_con->query($query);

                                echo "<table id='tbl_invoice_watch' style='margin-left:auto; margin-right:auto;'>
                               <thead>
                                 <tr>
                                   <th data-priority='1'>NO</th>
                                   <th data-priority='2'>TRUCK NO</th>
                                   <th data-priority='3'>CAPACITY</th>
                                   <th data-priority='4'>PRODUCT</th>
                                   <th data-priority='5'></th>
                                 </tr>
                               </thead>
                               <tbody>";
                                 while($row = $invoice_result->fetch_assoc()) {
                                  echo " <tr> ";
                                  echo " <td>" . $row['ROWNUM'] . "</td>";
                                  echo " <td>" . $row['TRUCKNO'] . "</td>";
                                  echo " <td>" . $row['CAPACITY'] . "</td>";
                                  echo " <td>" . $row['PRODUCT'] . "</td>";
                                  echo " <td> <input type=button id='btn_print' value='View'></button></td>";
                                  echo " </tr> "; 
                                 }

                                echo "</tbody>
                              </table>";                                                            
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


<script>

$(document).ready(function(){
    
  setInterval(function(){
    location.reload();
  },10000);
  
  
$("#tbl_data_entry_watch td").each(function () {

	var passed = $(this).closest('tr').find('td:eq(4)').text();
	
	
	if (passed === 'Y') {
          $(this).css('background-color', 'green');
	} else if (passed === 'N') {
          $(this).css('background-color', 'red');  
	}
         else if (passed === '') {
          $(this).css('background-color', 'yellow');  
	}
});


$("#tbl_safety_watch td").each(function () {

	var passed = $(this).closest('tr').find('td:eq(4)').text();
	
	
	if (passed === 'Y') {
          $(this).css('background-color', 'green');
	} else if (passed === 'N') {
          $(this).css('background-color', 'red');  
	}
});
  
  
  
});




</script>