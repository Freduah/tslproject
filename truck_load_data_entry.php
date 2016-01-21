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
                                        <table>
                                            <tr>
                                                <td><label for="entry_type">ENTRY TYPE</label></td> 
                                                <td><select id="entry_type" class="text ui-widget-content ui-corner-all">
                                                        <option value="">---</option>
                                                        <option value="BOST">BOST</option>
                                                        <option value="BOST-BDC">BOST-BDC</option>
                                                        <option value="BDC">BDC</option>
                                                    </select></td>
                                            </tr> 
                                            <tr>
                                                <td><label for="waybill_number">WAYBILL NUMBER</label></td>
                                                <td><input type="text" id="waybill_number" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="collection_order_number">COLLECTION ORDER</label></td>
                                                <td><input type="text" id="collection_order_number" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>    
                                            <td><label for="add_truck_number">TRUCK NUMBER</label></td>
                                            <td><input type="text" id="add_truck_number" value="" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                            <td><label for="add_truck_transporter">TRANSPORTER</label></td>
                                            <td><select id="add_truck_transporter" class="text ui-widget-content ui-corner-all">
                                                    <option value="">---</option>
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
                                            <tr>
                                            <td><label for="add_truck_bdc">BDC COMPANY</label></td>
                                            <td><select id="add_truck_bdc" class="text ui-widget-content ui-corner-all">
                                                    <option value=>---</option>
                                                    <?php  
                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                            $query = "SELECT * FROM `tsl_bdc`";
                                                            $result = $db_con->query($query);
                                                             while($row = $result->fetch_assoc()) {

                                                              echo "<option value='" . $row['bdcCode'] . "'> ". $row['bdcCode'] . " " . $row['Description']  ." </option>";                            

                                                             }    

                                                        } 

                                                    ?>                            
                                                </select></td></tr>
                                            <tr>    
                                            <td><label for="add_lifted_from">LIFTED FROM</label></td>
                                            <td><select id="add_lifted_from" class="text ui-widget-content ui-corner-all">
                                                    <option value="">---</option>
                                                </select></td>
                                            </tr>    
                                            
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
                                                <td><label for="countty_id">COUNTRY</label></td> 
                                                <td><select id="country_id" class="text ui-widget-content ui-corner-all">
                                                        <option value="">---</option>
                                                        <option value="GH">GHANA</option>
                                                        <option value="NG">NIGERIA</option>
                                                    </select></td>
                                            </tr>
                                            <tr>    
                                            <td><label for="add_lifted_to">LIFTED TO</label></td>
                                            <td><select id="add_lifted_to" class="text ui-widget-content ui-corner-all">
                                                    <option value="">---</option>
                                                </select></td>
                                            </tr>
                                            <tr>
                                            <td><label for="add_omc_type">OMC TYPE</label></td>
                                            <td><select id="add_omc_type" class="text ui-widget-content ui-corner-all">
                                                    <option value=>---</option>
                                                    <?php  
                                                        if($_SERVER['REQUEST_METHOD'] === 'GET'){

                                                            $query = "SELECT * FROM `tsl_bdc`";
                                                            $result = $db_con->query($query);
                                                             while($row = $result->fetch_assoc()) {

                                                              echo "<option value='" . $row['bdcCode'] . "'> ". $row['bdcCode'] . " " . $row['Description']  ." </option>";                            

                                                             }    

                                                        } 

                                                    ?>                            
                                                </select></td></tr>
                                            <tr>
                                                <td><label for="seal_number">SEAL NUMBER</label></td>
                                                <td><input type="text" id="seal_number" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="density_level">DENSITY LEVEL</label></td>
                                                <td><input type="text" id="density_level" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="dip_level">DIP LEVEL</label></td>
                                                <td><input type="text" id="dip_level" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="water_level">WATER LEVEL</label></td>
                                                <td><input type="text" id="water_level" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="temperature_level">TEMPERATURE</label></td>
                                                <td><input type="text" id="temperature_level" class="text ui-widget-content ui-corner-all"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="omc_destination">OMC DESTINATION</label></td>
                                                <td><input type="text" id="omc_destination" class="text ui-widget-content ui-corner-all"></td>
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
        <form id="edit_truck_entry_and_load_form">
            <fieldset>
                <label for="edit_truck_number">SERIAL NUMBER</label> 
                <input type="text" id="edit_serial_number" value="" class="text ui-widget-content ui-corner-all">
                
                <label for="edit_truck_number">TRUCK NUMBER</label> 
                <input type="text" id="edit_truck_number" value="" class="text ui-widget-content ui-corner-all">

                <label for="edit_truck_transporter">TRANSPORTER</label> 
                <input type="text" id="edit_truck_transporter" value="" class="text ui-widget-content ui-corner-all">  

                <label for="edit_truck_driver">DRIVER NAME</label> 
                <input type="text" id="edit_truck_driver" value="" class="text ui-widget-content ui-corner-all"> 

                <label for="edit_truck_capacity">CAPACITY</label> 
                <input type="text" id="edit_truck_capacity" value="" class="text ui-widget-content ui-corner-all"> 

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
                        </select> </td>

                    <td><label for="edit_truck_bdc">BDC</label></td>
                    <td><td><select id="edit_truck_bdc" class="text ui-widget-content ui-corner-all">
                            <option value=>---</option>
                            <?php  
                                if($_SERVER['REQUEST_METHOD'] === 'GET'){
                                                                   
                                    $query = "SELECT * FROM `tsl_bdc`";
                                    $result = $db_con->query($query);
                                     while($row = $result->fetch_assoc()) {

                                      echo "<option value='" . $row['bdcCode'] . "'> ". $row['bdcCode'] . " " . $row['Description']  ." </option>";                            

                                     }    
                                 
                                } 
                            
                            ?>                            
                        </select></td>
            </fieldset>                          
        </form> 
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
              . " AND DATE(t.ENTRYDATE) = DATE('$curr_date') ORDER BY t.ENTRYDATE DESC LIMIT 15";
              
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
       height: 570,
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
            var entry_date = $( "#add_truck_entry_date" ).val();
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
            } else if (entry_date === ''){
                $( "#lbl_truck_entry_and_load_alert" ).html("ENTRY DATE can not be empty.");
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
                  bdc:bdc, entry_date:entry_date, usno:unique_serial_no, genbarcode:genbar_code 
                }, 
                function( ){

                    console.log(truck_no + ' ' + transporter + ' ' + driver + ' ' + capacity + ' ' + product
                            + ' ' + bdc + ' ' + entry_date + ' ' + unique_serial_no + ' ' + genbar_code);
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
    
    
   $( "#add_truck_entry_date" ).datepicker({
        dateFormat: "yy-mm-dd"
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
      var entry_date = $( "#add_truck_entry_date" ).val();
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
      } else if (entry_date === ''){
          $( "#lbl_truck_entry_and_load_alert" ).html("ENTRY DATE can not be empty.");
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
            bdc:bdc, entry_date:entry_date, usno:unique_serial_no, genbarcode:genbar_code 
          }, 
          function( ){
              
              console.log(truck_no + ' ' + transporter + ' ' + driver + ' ' + capacity + ' ' + product
                      + ' ' + bdc + ' ' + entry_date + ' ' + unique_serial_no + ' ' + genbar_code);
               
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
       height: 600,
       width: 400,
       modal: true,
       dialogClass: 'uititle',
       
       buttons : {
          "Update": function(){
            
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
                 eserialnum:eserialnumber, egenbarcode:egen_barcode
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
        var truck_no =  $(this).closest('tr').find('td:eq(2)').text();
        var transporter =  $(this).closest('tr').find('td:eq(3)').text();
        var driver_name =  $(this).closest('tr').find('td:eq(4)').text();
        var capacity =  $(this).closest('tr').find('td:eq(5)').text();
        var product =  $(this).closest('tr').find('td:eq(6)').text();
        var bdc =  $(this).closest('tr').find('td:eq(7)').text();
        var barcode_text =  $(this).closest('tr').find('td:eq(8)').text(); 
        if(col_num === 11 && row_num !== null){

          $( "#barcode_gen").barcode(
              barcode_text,
            "code128"
            );         

          $( "#barcode_dialog" ).dialog( "open" );     
        } else if(col_num === 12 && row_num !== null){
            
            $( "#edit_truck_entry_dialog" ).dialog( "open" ); 
            $( "#edit_serial_number" ).val(serial_no);
            $( "#edit_truck_number").val(truck_no);
            $( "#edit_truck_transporter").val(transporter);
            $( "#edit_truck_driver").val(driver_name);
            $( "#edit_truck_capacity").val(capacity);
            $( "#edit_truck_product").val(product);
            $( "#edit_truck_bdc").val(bdc);
        }
 });


</script>

<?php  

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    if(!empty($_POST['truckno']) && !empty($_POST['transporter']) && !empty($_POST['driver'])  && !empty($_POST['capacity']) &&  
       !empty($_POST['product']) &&  !empty($_POST['bdc']) && !empty($_POST['entry_date']) ){
        
        $truckno = mysqli_real_escape_string($db_con, $_POST['truckno']);
        $transporter = mysqli_real_escape_string($db_con, $_POST['transporter']);
        $driver = mysqli_real_escape_string($db_con, $_POST['driver']);
        $capacity = mysqli_real_escape_string($db_con, $_POST['capacity']);
        $product = mysqli_real_escape_string($db_con, $_POST['product']);
        $bdc = mysqli_real_escape_string($db_con, $_POST['bdc']);
        $entry_date = mysqli_real_escape_string($db_con, $_POST['entry_date']); 
        $usno = mysqli_real_escape_string($db_con, $_POST['usno']);
        $genbarcode = mysqli_real_escape_string($db_con, $_POST['genbarcode']);
        $genbarcodedate = date('Y-m-d H:i:s');
       
        if(!empty($_SESSION['login_user_name']) !== NULL || !empty($_SESSION['login_user_name']) !== ""){
            $user_name = $_SESSION['login_user_name'];
            $query = "INSERT INTO tsl_truck_load (SNO, TRUCKNO, TRANSPORTER, DRIVERNAME, CAPACITY, PRODUCT, BDC, ENTRYDATE, CREATEDBY, GENBARCODE, GENBARCODEDATE) "
                    . "VALUES ('$usno','$truckno','$transporter','$driver','$capacity','$product','$bdc','$entry_date','$user_name','$genbarcode','$genbarcodedate')";
            
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

