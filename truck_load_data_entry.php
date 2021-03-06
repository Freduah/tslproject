<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/nav/apd_truck_load_nav.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>


<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">	
        
        
        <div id="truck_entry_dialog" title="Truck Entry And Loading">
            <table>
                <tr>
                     <label id="lbl_truck_entry_and_load_alert"></label>
                    <td>
                        <div id="data-entry-detail-one">
                                  
                                <form id="truck_entry_and_load_form">
                                    <fieldset>
                                        <table style="width: 380px;">
                                            <tr>
                                                <td><label for="add_entry_type">ENTRY TYPE</label></td> 
                                                <td><select id="add_entry_type" class="text ui-widget-content ui-corner-all">
                                                        <option value="">---</option>
                                                        <?php  
                                                            if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                    $query = "SELECT `EntryCode`,`EntryType`,`Description` FROM `tsl_entry_type`";
                                                                    $result = $db_con->query($query);
                                                                     while($row = $result->fetch_assoc()) {

                                                                      echo "<option value='" . $row['EntryCode'] . "'> ". $row['EntryType'] . " " . $row['Description']  ." </option>";                            

                                                                     }    

                                                            } 
                                                        ?>   
                                                    </select></td>
                                            </tr> 
                                            <tr>
                                                <td><label for="add_truck_waybill_number">WAYBILL NUMBER</label></td>
                                                <td><input type="text" id="add_truck_waybill_number" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="add_truck_collection_order_number">COLLECTION ORDER</label></td>
                                                <td><input type="text" id="add_truck_collection_order_number" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>    
                                            <td><label for="add_truck_number">TRUCK NUMBER</label></td>
                                            <td><input type="text" id="add_truck_number" value="" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                            <td><label for="add_truck_transporter">TRANSPORTER</label></td>
                                            <td><select id="add_truck_transporter" class="text ui-widget-content ui-corner-all">
                                                    <option value="">---</option>
                                                    <?php  
                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                $query = "SELECT `TRANPORTER_CODE`,`TRANSPORTER_NAME`,`Description` FROM `tsl_transporter`";
                                                                $result = $db_con->query($query);
                                                                 while($row = $result->fetch_assoc()) {

                                                                  echo "<option value='" . $row['TRANPORTER_CODE'] . "'> ". $row['TRANSPORTER_NAME'] . " " . $row['Description']  ." </option>";                            

                                                                 }    

                                                        } 

                                                    ?>   
                                                </select></td>
                                            </tr>
                                            <tr>
                                            <td><label for="add_truck_driver">DRIVER NAME</label></td>
                                            <td><input type="text" id="add_truck_driver" value="" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                            <td><label for="add_truck_capacity">CAPACITY(QTY) Ltr</label></td>
                                            <td><input type="text" id="add_truck_capacity" value="" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                            <td><label for="add_truck_product">PRODUCT</label></td>
                                            <td><select id="add_truck_product" class="text ui-widget-content ui-corner-all">
                                                    <option value=>---</option>
                                                    <?php  
                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                            $query = "SELECT `prodCode`, `prodName`, `Description` FROM `tsl_product`";
                                                            $result = $db_con->query($query);
                                                             while($row = $result->fetch_assoc()) {

                                                              echo "<option value='" . $row['prodCode'] . "'> ". $row['prodName'] . " " . $row['Description']  ." </option>";                            

                                                             }    

                                                        } 

                                                    ?>   
                                                </select> </td></tr>                                           
                                            
                                        </table>
                                    </fieldset>                          
                                </form>                            
                        </div>  <!-- End of truck entry detail one -->
                        
                    </td>
                    
                    <td>
                        
                        <div id="truck-entry-detail-two">
                            
                            <form id="truck_entry_and_load_form">
                                    <fieldset>
                                        <table>
                                            <tr>
                                            <td><label for="add_truck_bdc">BDC COMPANY</label></td>
                                            <td><select id="add_truck_bdc" class="text ui-widget-content ui-corner-all">
                                                    <option value=>---</option>
                                                    <?php  
                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                            $query = "SELECT `bdcCode`,`bdcName`,`Description` FROM `tsl_bdc`";
                                                            $result = $db_con->query($query);
                                                             while($row = $result->fetch_assoc()) {

                                                              echo "<option value='" . $row['bdcCode'] . "'> ". $row['bdcName'] . " " . $row['Description']  ." </option>";                            

                                                             }    

                                                        } 

                                                    ?>                            
                                                </select></td></tr>
                                            <tr>
                                                <td><label for="add_country_lifted_from">COUNTRY LIFTED FROM</label></td> 
                                                <td><select id="add_country_lifted_from" class="text ui-widget-content ui-corner-all">
                                                        <option value="">---</option>
                                                        <?php  
                                                            if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                    $query = "SELECT `Country_Code`,`Country_Name`,`Description` FROM `tsl_country`";
                                                                    $result = $db_con->query($query);
                                                                     while($row = $result->fetch_assoc()) {

                                                                      echo "<option value='" . $row['Country_Code'] . "'> ". $row['Country_Name'] . " " . $row['Description']  ." </option>";                            

                                                                     }    

                                                            } 

                                                        ?>   
                                                    </select></td>
                                            </tr>
                                            <tr>    
                                            <td><label for="add_depot_lifted_from">DEPOT LIFTED FROM</label></td>
                                            <td><select id="add_depot_lifted_from" class="text ui-widget-content ui-corner-all">
                                                    <option value="">---</option>
                                                    <?php  
                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                $query = "SELECT `DepotCode`,`DepotName`,`Description` FROM `tsl_depot`";
                                                                $result = $db_con->query($query);
                                                                 while($row = $result->fetch_assoc()) {

                                                                  echo "<option value='" . $row['DepotCode'] . "'> ". $row['DepotName'] . " " . $row['Description']  ." </option>";                            

                                                                 }    

                                                        } 

                                                    ?>   
                                                </select></td>
                                            </tr>    
                                            <tr>
                                                <td><label for="add_country_lifted_to">COUNTRY LIFTED TO</label></td> 
                                                <td><select id="add_country_lifted_to" class="text ui-widget-content ui-corner-all">
                                                        <option value="">---</option>
                                                        <?php  
                                                            if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                    $query = "SELECT `Country_Code`,`Country_Name`,`Description` FROM `tsl_country`";
                                                                    $result = $db_con->query($query);
                                                                     while($row = $result->fetch_assoc()) {

                                                                      echo "<option value='" . $row['Country_Code'] . "'> ". $row['Country_Name'] . " " . $row['Description']  ." </option>";                            

                                                                     }    

                                                            } 

                                                        ?>   
                                                    </select></td>
                                            </tr>
                                            <tr>    
                                            <td><label for="add_depot_lifted_to">DEPOT LIFTED TO</label></td>
                                            <td><select id="add_depot_lifted_to" class="text ui-widget-content ui-corner-all">
                                                    <option value="">---</option>
                                                    <?php  
                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                $query = "SELECT `DepotCode`,`DepotName`,`Description` FROM `tsl_depot`";
                                                                $result = $db_con->query($query);
                                                                 while($row = $result->fetch_assoc()) {

                                                                  echo "<option value='" . $row['DepotCode'] . "'> ". $row['DepotName'] . " " . $row['Description']  ." </option>";                            

                                                                 }    

                                                        } 

                                                    ?>   
                                                </select></td>
                                            </tr>
                                            <tr>
                                            <td><label for="add_omc_type">OMC TYPE</label></td>
                                            <td><select id="add_omc_type" class="text ui-widget-content ui-corner-all">
                                                    <option value=>---</option>
                                                    <?php  
                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                            $query = "SELECT `OMC_CODE`,`OMC_NAME`,`Description` FROM `tsl_omc_type`";
                                                            $result = $db_con->query($query);
                                                             while($row = $result->fetch_assoc()) {

                                                              echo "<option value='" . $row['OMC_CODE'] . "'> ". $row['OMC_NAME'] . " " . $row['Description']  ." </option>";                            

                                                             }    

                                                        } 

                                                    ?>                            
                                                </select></td></tr>
                                            <tr>
                                                <td><label for="add_omc_destination">OMC DESTINATION</label></td>
                                                <td><textarea id="add_omc_destination" cols="35" class="text ui-widget-content ui-corner-all"></textarea></td>
                                            </tr>
                                        </table>
                                    </fieldset>                          
                                </form>
                            
                                                              
                        </div>  <!-- End Of Truck Entry Detail Two -->
                        
                        
                        
                    </td>
                </tr>
            </table>
        </div> <!-- End of Truck Entry Dialog div -->
       
        
        <div id="edit_truck_entry_dialog" title="Edit Truck Entry">
	<table>
		<tr>
            <td>
                    <div id="edit_data-entry-detail-one">

                                    <form id="edit_truck_entry_and_load_form">
                                            <fieldset>
                                                    <table id="tb-edit-data-entry-detail-one" style="width: 380px;">
                                                        <tr>
                                                            <td><label for="edit_serial_number">SNO</label></td>
                                                            <td><input type="text" id="edit_serial_number" class="text ui-corner-all ui-widget-content" /></td>
                                                        </tr>
                                                        <tr>                                                                
                                                            <td><label for="edit_entry_type">ENTRY TYPE</label></td> 
                                                            <td><select id="edit_entry_type" class="text ui-widget-content ui-corner-all">
                                                                    <option value="">---</option>
                                                                    <?php  
                                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                            $query = "SELECT `EntryCode`,`EntryType`,`Description` FROM `tsl_entry_type`";
                                                                            $result = $db_con->query($query);
                                                                             while($row = $result->fetch_assoc()) {

                                                                              echo "<option value='" . $row['EntryCode'] . "'> ". $row['EntryType'] . " " . $row['Description']  ." </option>";                            

                                                                             }    

                                                                        } 
                                                                    ?>   
                                                                </select></td>
                                                        </tr> 
                                                        <tr>
                                                                <td><label for="edit_truck_waybill_number">WAYBILL NUMBER</label></td>
                                                                <td><input type="text" id="edit_truck_waybill_number" class="text ui-widget-content ui-corner-all"></td>
                                                        </tr>
                                                        <tr>
                                                                <td><label for="edit_truck_collection_order_number">COLLECTION ORDER</label></td>
                                                                <td><input type="text" id="edit_truck_collection_order_number" class="text ui-widget-content ui-corner-all"></td>
                                                        </tr>
                                                        <tr>    
                                                        <td><label for="edit_truck_number">TRUCK NUMBER</label></td>
                                                        <td><input type="text" id="edit_truck_number" value="" class="text ui-widget-content ui-corner-all"></td>
                                                        </tr>
                                                        <tr>
                                                        <td><label for="edit_truck_transporter">TRANSPORTER</label></td>
                                                        <td><select id="edit_truck_transporter" class="text ui-widget-content ui-corner-all">
                                                                        <option value="">---</option>
                                                                        <?php  
                                                                                if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                                                $query = "SELECT `TRANPORTER_CODE`,`TRANSPORTER_NAME`,`Description` FROM `tsl_transporter`";
                                                                                                $result = $db_con->query($query);
                                                                                                 while($row = $result->fetch_assoc()) {

                                                                                                  echo "<option value='" . $row['TRANPORTER_CODE'] . "'> ". $row['TRANSPORTER_NAME'] . " " . $row['Description']  ." </option>";                            

                                                                                                 }    

                                                                                } 

                                                                        ?>   
                                                                </select></td>
                                                        </tr>
                                                        <tr>
                                                        <td><label for="edit_truck_driver">DRIVER NAME</label></td>
                                                        <td><input type="text" id="edit_truck_driver" value="" class="text ui-widget-content ui-corner-all"></td>
                                                        </tr>
                                                        <tr>
                                                        <td><label for="edit_truck_capacity">CAPACITY(QTY) Ltr</label></td>
                                                        <td><input type="text" id="edit_truck_capacity" value="" class="text ui-widget-content ui-corner-all"></td>
                                                        </tr>
                                                        <tr>
                                                        <td><label for="edit_truck_product">PRODUCT</label></td>
                                                        <td><select id="edit_truck_product" class="text ui-widget-content ui-corner-all">
                                                                        <option value=>---</option>
                                                                        <?php  
                                                                                if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                                        $query = "SELECT `prodCode`, `prodName`, `Description` FROM `tsl_product`";
                                                                                        $result = $db_con->query($query);
                                                                                         while($row = $result->fetch_assoc()) {

                                                                                          echo "<option value='" . $row['prodCode'] . "'> ". $row['prodName'] . " " . $row['Description']  ." </option>";                            

                                                                                         }    

                                                                                } 

                                                                        ?>   
                                                                </select> </td></tr>                                           

                                                    </table>
                                            </fieldset>                          
                                    </form>                            
				</div>  <!-- End of truck entry detail one -->
				
			</td>
			
			<td>
				
				<div id="edit-truck-entry-detail-two">
					
					<form id="edit_truck_entry_and_load_form_two">
                                                <fieldset>
                                                        <table>
                                                                <tr>
                                                                <td><label for="edit_truck_bdc">BDC COMPANY</label></td>
                                                                <td><select id="edit_truck_bdc" class="text ui-widget-content ui-corner-all">
                                                                                <option value=>---</option>
                                                                                <?php  
                                                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                                                $query = "SELECT `bdcCode`,`bdcName`,`Description` FROM `tsl_bdc`";
                                                                                                $result = $db_con->query($query);
                                                                                                 while($row = $result->fetch_assoc()) {

                                                                                                  echo "<option value='" . $row['bdcCode'] . "'> ". $row['bdcName'] . " " . $row['Description']  ." </option>";                            

                                                                                                 }    

                                                                                        } 

                                                                                ?>                            
                                                                        </select></td></tr>
                                                                <tr>
                                                                        <td><label for="edit_country_lifted_from">COUNTRY LIFTED FROM</label></td> 
                                                                        <td><select id="edit_country_lifted_from" class="text ui-widget-content ui-corner-all">
                                                                                        <option value="">---</option>
                                                                                        <?php  
                                                                                                if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                                                                $query = "SELECT `Country_Code`,`Country_Name`,`Description` FROM `tsl_country`";
                                                                                                                $result = $db_con->query($query);
                                                                                                                 while($row = $result->fetch_assoc()) {

                                                                                                                  echo "<option value='" . $row['Country_Code'] . "'> ". $row['Country_Name'] . " " . $row['Description']  ." </option>";                            

                                                                                                                 }    

                                                                                                } 

                                                                                        ?>   
                                                                                </select></td>
                                                                </tr>
                                                                <tr>    
                                                                <td><label for="edit_depot_lifted_from">DEPOT LIFTED FROM</label></td>
                                                                <td><select id="edit_depot_lifted_from" class="text ui-widget-content ui-corner-all">
                                                                                <option value="">---</option>
                                                                                <?php  
                                                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                                                        $query = "SELECT `DepotCode`,`DepotName`,`Description` FROM `tsl_depot`";
                                                                                                        $result = $db_con->query($query);
                                                                                                         while($row = $result->fetch_assoc()) {

                                                                                                          echo "<option value='" . $row['DepotCode'] . "'> ". $row['DepotName'] . " " . $row['Description']  ." </option>";                            

                                                                                                         }    

                                                                                        } 

                                                                                ?>   
                                                                        </select></td>
                                                                </tr>    
                                                                <tr>
                                                                    <td><label for="edit_country_lifted_to">COUNTRY LIFTED TO</label></td> 
                                                                    <td><select id="edit_country_lifted_to" class="text ui-widget-content ui-corner-all">
                                                                            <option value="">---</option>
                                                                            <?php  
                                                                                    if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                                                    $query = "SELECT `Country_Code`,`Country_Name`,`Description` FROM `tsl_country`";
                                                                                                    $result = $db_con->query($query);
                                                                                                     while($row = $result->fetch_assoc()) {

                                                                                                      echo "<option value='" . $row['Country_Code'] . "'> ". $row['Country_Name'] . " " . $row['Description']  ." </option>";                            

                                                                                                     }    

                                                                                    } 

                                                                            ?>   
                                                                        </select></td>
                                                                </tr>
                                                                <tr>    
                                                                <td><label for="edit_depot_lifted_to">DEPOT LIFTED TO</label></td>
                                                                <td><select id="edit_depot_lifted_to" class="text ui-widget-content ui-corner-all">
                                                                                <option value="">---</option>
                                                                                <?php  
                                                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                                                        $query = "SELECT `DepotCode`,`DepotName`,`Description` FROM `tsl_depot`";
                                                                                                        $result = $db_con->query($query);
                                                                                                         while($row = $result->fetch_assoc()) {

                                                                                                          echo "<option value='" . $row['DepotCode'] . "'> ". $row['DepotName'] . " " . $row['Description']  ." </option>";                            

                                                                                                         }    

                                                                                        } 

                                                                                ?>   
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                <td><label for="edit_omc_type">OMC TYPE</label></td>
                                                                <td><select id="edit_omc_type" class="text ui-widget-content ui-corner-all">
                                                                                <option value=>---</option>
                                                                                <?php  
                                                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                                                                $query = "SELECT `OMC_CODE`,`OMC_NAME`,`Description` FROM `tsl_omc_type`";
                                                                                                $result = $db_con->query($query);
                                                                                                 while($row = $result->fetch_assoc()) {

                                                                                                  echo "<option value='" . $row['OMC_CODE'] . "'> ". $row['OMC_NAME'] . " " . $row['Description']  ." </option>";                            

                                                                                                 }    

                                                                                        } 

                                                                                ?>                            
                                                                        </select></td></tr>
                                                                <tr>
                                                                        <td><label for="edit_omc_destination">OMC DESTINATION</label></td>
                                                                        <td><textarea id="edit_omc_destination" cols="35" class="text ui-widget-content ui-corner-all"></textarea></td>
                                                                </tr>
                                                        </table>
                                                </fieldset>                          
						</form>
					
													  
				</div>  <!-- End Of Truck Entry Detail Two -->
				
				
				
			</td>
		</tr>
	</table>
</div> <!-- End Of Edit Truck Entry Div -->               
            

<div id="home-content-scroll" class="clearfix row">
    
 <?php   
 
 if($_SERVER['REQUEST_METHOD'] === 'GET') {
     
     if(!empty($_SESSION['login_user_name']))
     {
      $user_name = $_SESSION['login_user_name'];
      $curr_date = date('Y-m-d H:i:s');
      $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id, t.SNO,t.TRUCKNO,t.TRANSPORTER,t.DRIVERNAME,t.CAPACITY, "
              . "t.PRODUCT, t.GENBARCODE, t.BDC,t.ENTRYDATE  FROM tsl_truck_load AS t, "
              . "(SELECT @i:=0) AS foo WHERE t.CREATEDBY='$user_name' AND t.HASPASSEDSAFETY !='Y' "
              . " AND DATE(t.ENTRYDATE) = DATE('$curr_date') ORDER BY t.ENTRYDATE ASC LIMIT 15";
              
      $result = $db_con->query($query);
      
      echo "<table id='tbl_truck_entry' style='margin-left:auto; margin-right:auto;'>
      <thead>
        <tr>
          <th data-priority='1'>NO</th>
          <th data-priority='1'>SNO</th>
          <th data-priority='2'>TRUCK NO</th>
          <th data-priority='3'>TRANSPORTER</th>
          <th data-priority='4'>DRIVER NAME</th>
          <th data-priority='6'>CAPACITY</th>
          <th data-priority='7'>PRODUCT</th>
          <th data-priority='8'>BDC</th>
          <th data-priority='8'>BARCODE NO</th>
          <th data-priority='9'>ENTRY DATE</th>
          <th data-priority='9'></th>
          <th data-priority='9'></th>
        </tr>
      </thead>
      <tbody>";
        while($row = $result->fetch_assoc()) {
         echo " <tr> ";
         echo " <td>" . $row['ROWNUM'] . "</td>";
         echo " <td>" . $row['SNO'] . "</td>";
         echo " <td>" . $row['TRUCKNO'] . "</td>";
         echo " <td>" . $row['TRANSPORTER'] . "</td>";
         echo " <td>" . $row['DRIVERNAME'] . "</td>";
         echo " <td>" . $row['CAPACITY'] . "</td>";
         echo " <td>" . $row['PRODUCT'] . "</td>";
         echo " <td>" . $row['BDC'] . "</td>";
         echo " <td>" . $row['GENBARCODE'] . "</td>";
         echo " <td>" . $row['ENTRYDATE'] . "</td>";
         echo " <td> <input type=button id='btn_print' value='Print'></button></td>";
         echo " <td> <input type=button id='btn_edit' value='Edit'></button></td>";
         echo " </tr> "; 
        }

       echo "</tbody>
        </table>";
       
      $db_con->close();   
     } 
 }
   
?>    
    

<div id="barcode_dialog" title="Print Barcode">
    <table>
        <tr>
            <td> <div id="barcode_gen"></div> </td>
        </tr>
    </table>            
</div> <!-- End of Barcode dialog -->
        
           
    
    
    
</div>  <!-- End of home content div -->
        
        
   </div> <!-- end of content div -->
  </div>    
</div>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>


<script>

$(function(){
    
    $( "#barcode_dialog" ).dialog({
                   
        autoOpen: false,
        height: 200,
        width: 330,
        modal: true,
        dialogClass: 'uititle',
        
        buttons: { 
            "Print": function() {                              
            var divContents = $("#barcode_gen").html();
            var printWindow = window.open('', '', 'height=200,width=330');
            printWindow.document.write('<html><head><title>  </title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
            location.reload();
        
            },
            "Close": function() { 
               $(this).dialog("close");
               location.reload();
            }
        }
   });
   
   
    
   $( "#truck_entry_dialog" ).dialog({
       
       autoOpen: false,
       height: 500,
       width: 800,
       modal: true,
       dialogClass: 'uititle',
        
       show: {
          effect: "blind",
          duration: 1000
       },
       hide: {
          effect: "explode",
          duration: 1000
       } ,
        
        buttons: { 
            "Save": function() {                              
            var valid = true;
            var truck_no = $( "#add_truck_number" ).val();
            var transporter = $( "#add_truck_transporter" ).val();
            var driver = $( "#add_truck_driver" ).val();
            var capacity = $( "#add_truck_capacity" ).val();
            var product = $( "#add_truck_product" ).val();
            var bdc = $( "#add_truck_bdc" ).val();
            //var entry_date = $( "#add_truck_entry_date" ).val();
            
            var entry_type = $( "#add_entry_type" ).val(); 
            var omc_type = $( "#add_omc_type" ).val();
            var omc_destination = $( "#add_omc_destination" ).val();
            var depot_lifted_to = $( "#add_depot_lifted_to" ).val();
            var country_lifted_to = $( "#add_country_lifted_to" ).val();
            var depot_lifted_from = $( "#add_depot_lifted_from" ).val();
            var country_lifted_from = $( "#add_country_lifted_from" ).val();
            var truck_waybill_number = $( "#add_truck_waybill_number" ).val();
            var truck_collection_order_number = $( "#add_truck_collection_order_number" ).val();

            
            
            var unique_serial_no = generateUUID();
            var genbar_code = '*' + unique_serial_no + $( "#add_truck_number" ).val() + '*';

            if (truck_no === ''){
                $( "#lbl_truck_entry_and_load_alert" ).html("TRUCK NO can not be empty.");
                $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
                valid = false;
            } else if (transporter === ''){
                $( "#lbl_truck_entry_and_load_alert" ).html("TRANSPORTER can not be empty.");
                $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
                valid = false;
            } else if (driver === ''){
                $( "#lbl_truck_entry_and_load_alert" ).html("DRIVER can not be empty.");
                $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
                valid = false;
            } else if (capacity === ''){
                $( "#lbl_truck_entry_and_load_alert" ).html("CAPACITY can not be empty.");
                $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
                valid = false;
            } else if (product === ''){
                $( "#lbl_truck_entry_and_load_alert" ).html("PRODUCT can not be empty.");
                $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
                valid = false;
            } else if (bdc === ''){
                $( "#lbl_truck_entry_and_load_alert" ).html("BDC can not be empty.");
                $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
                valid = false;
            } else if (genbar_code === ''){
                $( "#lbl_truck_entry_and_load_alert" ).html("BARCODE can not be empty.");
                $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
                valid = false;
            }       

            if( valid ){

                $.post("truck_load_data_entry.php", 
                {
                  truckno:truck_no, transporter:transporter, driver:driver, capacity:capacity, product:product, 
                  bdc:bdc, usno:unique_serial_no, genbarcode:genbar_code,
                  entrytype:entry_type,omctype:omc_type,omcdestination:omc_destination,depotliftedto:depot_lifted_to,
                  countryliftedto:country_lifted_to,depotliftedfrom:depot_lifted_from,countryliftedfrom:country_lifted_from,
                  waybillnumber:truck_waybill_number,collectionordernumber:truck_collection_order_number  
                }, 
                function( ){

                    console.log(truck_no + ' ' + transporter + ' ' + driver + ' ' + capacity + ' ' + product
                            + ' ' + bdc + ' ' + ' ' + unique_serial_no + ' ' + genbar_code);
                    location.reload();
                });       
            }
            
        
            },
            "Cancel": function() { 
               $(this).dialog("close");
               location.reload();
            }
        }      
   });
       
   function generateUUID(){
    /*var d = new Date().getTime();
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = (d + Math.random()*16)%16 | 0;
        d = Math.floor(d/16);
        return (c=='x' ? r : (r&0x3|0x8)).toString(16);
    });*/
        
        
    var currentTime = new Date();
    var year = currentTime.getFullYear();
    var month = currentTime.getMonth() + 1;
    var day = currentTime.getDate();
    var hour = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
    
    var uuid = 'APD' + '' + year + '' + month + '' + day + '' + hour + '' + minutes + '' + seconds;
        
    return uuid;
   }
    
    
   $( "#btn_save_entry" ).click(function(){
       
      var valid = true;
      var truck_no = $( "#add_truck_number" ).val();
      var transporter = $( "#add_truck_transporter" ).val();
      var driver = $( "#add_truck_driver" ).val();
      var capacity = $( "#add_truck_capacity" ).val();
      var product = $( "#add_truck_product" ).val();
      var bdc = $( "#add_truck_bdc" ).val();
      
      var entry_type = $( "#add_entry_type" ).val(); 
      var omc_type = $( "#add_omc_type" ).val();
      var omc_destination = $( "#add_omc_destination" ).val();
      var depot_lifted_to = $( "#add_depot_lifted_to" ).val();
      var country_lifted_to = $( "#add_country_lifted_to" ).val();
      var depot_lifted_from = $( "#add_depot_lifted_from" ).val();
      var country_lifted_from = $( "#add_country_lifted_from" ).val();
      var truck_waybill_number = $( "#add_truck_waybill_number" ).val();
      var truck_collection_order_number = $( "#add_truck_collection_order_number" ).val();


      
      var unique_serial_no = generateUUID();
      var genbar_code = '*' + unique_serial_no + $( "#add_truck_number" ).val() + '*';
      
      if (truck_no === ''){
          $( "#lbl_truck_entry_and_load_alert" ).html("TRUCK NO can not be empty.");
          $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
          valid = false;
      } else if (transporter === ''){
          $( "#lbl_truck_entry_and_load_alert" ).html("TRANSPORTER can not be empty.");
          $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
          valid = false;
      } else if (driver === ''){
          $( "#lbl_truck_entry_and_load_alert" ).html("DRIVER can not be empty.");
          $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
          valid = false;
      } else if (capacity === ''){
          $( "#lbl_truck_entry_and_load_alert" ).html("CAPACITY can not be empty.");
          $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
          valid = false;
      } else if (product === ''){
          $( "#lbl_truck_entry_and_load_alert" ).html("PRODUCT can not be empty.");
          $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
          valid = false;
      } else if (bdc === ''){
          $( "#lbl_truck_entry_and_load_alert" ).html("BDC can not be empty.");
          $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
          valid = false;
      } else if (genbar_code === ''){
          $( "#lbl_truck_entry_and_load_alert" ).html("BARCODE can not be empty.");
          $( "#lbl_truck_entry_and_load_alert" ).css('color','red');
          valid = false;
      }       
      
      if( valid ){
          
          $.post("truck_load_data_entry.php", 
          {
            truckno:truck_no, transporter:transporter, driver:driver, capacity:capacity, product:product, 
            bdc:bdc, usno:unique_serial_no, genbarcode:genbar_code,
            entrytype:entry_type,omctype:omc_type,omcdestination:omc_destination,depotliftedto:depot_lifted_to,
            countryliftedto:country_lifted_to,depotliftedfrom:depot_lifted_from,countryliftedfrom:country_lifted_from,
            waybillnumber:truck_waybill_number,collectionordernumber:truck_collection_order_number            
          }, 
          function( ){
              
              console.log(truck_no + ' ' + transporter + ' ' + driver + ' ' + capacity + ' ' + product
                      + ' ' + bdc + ' ' + ' ' + unique_serial_no + ' ' + genbar_code);
               
                /* $( "#barcode_gen").barcode(
                       '*'+unique_serial_no+truck_no+'*',
                       "code128"
                       );         

                 $( "#barcode_dialog" ).dialog( "open" );  */           
              
          });       
      }
      
      
      
   });   
     
   $( "#btn_add_truck_for_load" ).click(function(){
     $( "#truck_entry_dialog" ).dialog( "open" );  
   });
   
   $( "#btn_cancel_enrty" ).click(function(){
      $( "#truck_entry_dialog" ).dialog( "close" ); 
      
        location.reload();

   });
   
   
   /// For Truck Number Input Box Code
   
   $( "#add_truck_number" ).on('input', function(e){
             
       if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
        }
       $("#add_truck_number").val(($("#add_truck_number").val()).toUpperCase());      
   });
   
   $( "#add_truck_waybill_number" ).on('input', function(e){
             
       if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
        }
       $("#add_truck_waybill_number").val(($("#add_truck_waybill_number").val()).toUpperCase());      
    });

    $( "#add_truck_collection_order_number" ).on('input', function(e){
             
       if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
        }
       $("#add_truck_collection_order_number").val(($("#add_truck_collection_order_number").val()).toUpperCase());      
    });
   
   
   /// For Tuck Transporter Input Box Code
   $( "#add_truck_transporter" ).on('input', function(e){
        if (/^[0-9]+$/.test(this.value))
        {
            // Filter non-digits from input value.
            this.value = this.value.replace(/^[0-9]+$/, '');
        }      
        else if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
        }
       $("#add_truck_transporter").val(($("#add_truck_transporter").val()).toUpperCase());      
   });
   
   /// For Tuck Driver Input Box Code
   $( "#add_truck_driver" ).on('input', function(e){
        if (/^[0-9]+$/.test(this.value))
        {
            // Filter non-digits from input value.
            this.value = this.value.replace(/^[0-9]+$/, '');
        }      
        else if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
        }
       $("#add_truck_driver").val(($("#add_truck_driver").val()).toUpperCase()); 
   });
   
   ///For truck Capacity Input Box Code
   $( "#add_truck_capacity").on('input', function(e){
      if (/\D/g.test(this.value))
        {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }       
   });
   
   // Edit Truck Entry Scripts
   
   $( "#edit_truck_entry_dialog" ).dialog({
       
       autoOpen: false,
       height: 530,
       width: 800,
       modal: true,
       dialogClass: 'uititle',
       
       buttons : {
          "Update": function(){
            
            var eentry_type = $( "#edit_entry_type" ).val();
            var ewaybill_no = $( "#edit_truck_waybill_number" ).val();
            var ecollection_no = $( "#edit_truck_collection_order_number" ).val();
            var ectrlift_from = $( "#edit_country_lifted_from" ).val();
            var edepotlift_from = $( "#edit_depot_lifted_from" ).val();
            var ectrylift_to = $( "#edit_country_lifted_to" ).val();
            var edepotlift_to = $( "#edit_depot_lifted_to" ).val();              
            var eomc_type = $( "#edit_omc_type" ).val();
            var eomc_destination = $( "#edit_omc_destination" ).val();
            
            var eserialnumber = $( "#edit_serial_number" ).val();
            var etruck_number = $( "#edit_truck_number").val();
            var etruck_transporter = $( "#edit_truck_transporter").val();
            var etruck_driver = $( "#edit_truck_driver").val();
            var etruck_capacity = $( "#edit_truck_capacity").val();
            var etruck_product = $( "#edit_truck_product").val();
            var etruck_bdc = $( "#edit_truck_bdc").val();
            var egen_barcode = '*' + $( "#edit_serial_number" ).val()+$( "#edit_truck_number").val() + '*';
            var etruck_entry_date = new Date();
              
              
              $.post("edit_truck.php",
              {
                 etrucknumber:etruck_number,  etrucktransporter:etruck_transporter, etruckdriver:etruck_driver,
                 etruckcapacity:etruck_capacity,etruckproduct:etruck_product, etruckbdc:etruck_bdc, modifieddate:etruck_entry_date,
                 eserialnum:eserialnumber, egenbarcode:egen_barcode, entrytype:eentry_type, waybillno:ewaybill_no, collectionoder:ecollection_no,
                 countryfrom:ectrlift_from, depotfrom:edepotlift_from, countryto:ectrylift_to, depotto:edepotlift_to,omctype:eomc_type, omcdest:eomc_destination
              }, 
              function( data ){
                 
                if(data === '1'){
                    
                    alert('Record successfully updated!');
                    location.reload();
                    
                }
                  
              });              
              
          },
          "Barcode": function(){
            
             $( "#barcode_gen").barcode(
                       '*'+ $( "#edit_serial_number").val()+ $( "#edit_truck_number" ).val() +'*',
                       "code128"
                       );         

               $( "#barcode_dialog" ).dialog( "open" );s
              
          },
          "Cancel": function(){
             $( "#edit_truck_entry_dialog" ).dialog( "close" );             
          }           
       },
       
       show: {
          effect: "blind",
          duration: 1000
       },
       hide: {
          effect: "explode",
          duration: 1000
       }       
   });
   
   $( "#edit_truck_entry_date" ).datepicker(); 
     
   
   
   $( "#btn_edit_truck_for_load" ).click(function(){
     $( "#edit_truck_entry_dialog" ).dialog( "open" );  
   });
       
});

$(document).ready(function(){
    
    $.ajax({      
      type: "GET",
      url: "truck_load_data_entry.php",             
      dataType: "html",                  
      success: function(){ 
            
      }        
    });   
    
});

$( "#edit_serial_number" ).on('input', function(){
    
    var serial = $( "#edit_serial_number" ).val();
    
   $.get("edit_truck.php",
   {
       serialnumber:serial
   },
   function( data ){
       var result = $.parseJSON(data);
       console.log(result);
       if(result.truckno !== '') {           
            $( "#edit_truck_number").val(result.truckno);
            $( "#edit_truck_transporter").val(result.transporter);
            $( "#edit_truck_driver").val(result.drivername);

            $( "#edit_truck_capacity").val(result.capacity);
            $( "#edit_truck_product").val(result.product);
            $( "#edit_truck_bdc").val(result.bdc);
            $( "#edit_truck_entry_date").val(result.entrydate);
           
       } else {
          
            $( "#edit_truck_number").val('');
            $( "#edit_truck_transporter").val('');
            $( "#edit_truck_driver").val('');

            $( "#edit_truck_capacity").val('');
            $( "#edit_truck_product").val('');
            $( "#edit_truck_bdc").val('');
            $( "#edit_truck_entry_date").val('');
           
          
       }
   });
    
});

 $("#tbl_truck_entry td").click(function() {     
 
        var col_num = parseInt( $(this).index() ) + 1;
        var row_num = parseInt( $(this).parent().index() )+1;   
        var serial_no = $(this).closest('tr').find('td:eq(1)').text();
        var barcode_text =  $(this).closest('tr').find('td:eq(8)').text(); 
        if(col_num === 11 && row_num !== null){

          $( "#barcode_gen").barcode(
              barcode_text,
            "code128"
            );         

          $( "#barcode_dialog" ).dialog( "open" );     
        } else if(col_num === 12 && row_num !== null){
            
            $.post('edit_truck_data_entry.php',
            {
              serialno:serial_no  
            }, function(data){
                var rs = $.parseJSON(data);
                $( "#edit_truck_entry_dialog" ).dialog( "open" );                 
                $( "#edit_serial_number" ).val(rs.SNO);
                $( "#edit_entry_type" ).val(rs.ENTRY_TYPE);
                $( "#edit_truck_waybill_number" ).val(rs.WAYBILL_NO);
                $( "#edit_truck_collection_order_number" ).val(rs.COLLECTION_ORDER_NO);
                $( "#edit_truck_number" ).val(rs.TRUCKNO);
                $( "#edit_truck_transporter" ).val(rs.TRANSPORTER);
                $( "#edit_truck_driver" ).val(rs.DRIVERNAME);
                $( "#edit_truck_capacity" ).val(rs.CAPACITY);
                $( "#edit_truck_product" ).val(rs.PRODUCT);
                $( "#edit_truck_bdc" ).val(rs.BDC);
                $( "#edit_country_lifted_from" ).val(rs.COUNTRY_LIFTED_FROM);
                $( "#edit_depot_lifted_from" ).val(rs.DEPOT_LIFTED_FROM);
                $( "#edit_country_lifted_to" ).val(rs.COUNTRY_LIFTED_TO);
                $( "#edit_depot_lifted_to" ).val(rs.DEPOT_LIFTED_TO);              
                $( "#edit_omc_type" ).val(rs.OMC_TYPE);
                $( "#edit_omc_destination" ).val(rs.OMC_DESTINATION);
            });
            
              
        }
 });


</script>

<?php  

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    if(!empty($_POST['truckno']) && !empty($_POST['transporter']) && !empty($_POST['driver'])  && !empty($_POST['capacity']) &&  
       !empty($_POST['product']) &&  !empty($_POST['bdc']) ){
        
        $truckno = mysqli_real_escape_string($db_con, $_POST['truckno']);
        $transporter = mysqli_real_escape_string($db_con, $_POST['transporter']);
        $driver = mysqli_real_escape_string($db_con, $_POST['driver']);
        $capacity = mysqli_real_escape_string($db_con, $_POST['capacity']);
        $product = mysqli_real_escape_string($db_con, $_POST['product']);
        $bdc = mysqli_real_escape_string($db_con, $_POST['bdc']);
        $usno = mysqli_real_escape_string($db_con, $_POST['usno']);
        $genbarcode = mysqli_real_escape_string($db_con, $_POST['genbarcode']);
        $genbarcodedate = date('Y-m-d H:i:s');
        $entry_date = date('Y-m-d H:i:s');
        
        $entry_type = mysqli_real_escape_string($db_con, $_POST['entrytype']);
        $waybillnumber = mysqli_real_escape_string($db_con, $_POST['waybillnumber']);
        $collectionordernumber = mysqli_real_escape_string($db_con, $_POST['collectionordernumber']);        
        $omc_type = mysqli_real_escape_string($db_con, $_POST['omctype']);
        $omcdestination = mysqli_real_escape_string($db_con, $_POST['omcdestination']);
        $depliftedfrom = mysqli_real_escape_string($db_con, $_POST['depotliftedfrom']);
        $depliftedto = mysqli_real_escape_string($db_con, $_POST['depotliftedto']);
        $countryfrom =  mysqli_real_escape_string($db_con, $_POST['countryliftedfrom']);
        $countryto = mysqli_real_escape_string($db_con, $_POST['countryliftedto']);
        
       
        
        if(!empty($_SESSION['login_user_name']) !== NULL || !empty($_SESSION['login_user_name']) !== ""){
            $user_name = $_SESSION['login_user_name'];
            $query = "INSERT INTO tsl_truck_load (SNO, TRUCKNO, TRANSPORTER, DRIVERNAME, CAPACITY, PRODUCT, BDC, ENTRYDATE, CREATEDBY, GENBARCODE, GENBARCODEDATE,"
                    . " ENTRY_TYPE, WAYBILL_NO, COLLECTION_ORDER_NO, COUNTRY_LIFTED_FROM, COUNTRY_LIFTED_TO, DEPOT_LIFTED_FROM, DEPOT_LIFTED_TO, OMC_TYPE, OMC_DESTINATION) "
                    . "VALUES ('$usno','$truckno','$transporter','$driver','$capacity','$product','$bdc','$entry_date','$user_name','$genbarcode','$genbarcodedate',"
                    . "'$entry_type','$waybillnumber','$collectionordernumber','$countryfrom','$countryto','$depliftedfrom','$depliftedto','$omc_type','$omcdestination')";
            
            if ($db_con->query($query) === TRUE) 
                {
                  echo $data = 'New record successfully saved.';                               
                } else {
                  echo $data = 'error';
                }
               $db_con->close();
            
        }  else {
            
            header("location: login.php");
            
        }   
        
    }      
}

?>

