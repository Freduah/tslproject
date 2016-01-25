<?php session_start(); ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>

<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">	
        <table>
            <tr>
               <td><input type="button" id="country_entry_button" class="styled-login-menu-button" value="COUNTRY ENTRY" /></td>
               <td><input type="button" id="bdc_entry_button" class="styled-login-menu-button" value="BDC ENTRY" /></td>
               <td><input type="button" id="depot_entry_button" class="styled-login-menu-button" value="DEPOT ENTRY" /></td>
            </tr>
            <tr>
               <td><input type="button" id="omc_entry_button" class="styled-login-menu-button" value="OMC TYPE ENTRY" /></td>
               <td><input type="button" id="transporter_entry_button" class="styled-login-menu-button" value="TRANSPORTER ENTRY" /></td>
               <td><input type="button" id="product_entry_button" class="styled-login-menu-button" value="PRODUCT ENTRY" /></td> 
            </tr>
        </table>  
        
        <div id="contry_entry_dailog" title="COUNTRY ENTRY">
            <table>
                <tr>
                    <td><label for="country_code">COUNTRY CODE</label></td>
                    <td><input type="text" id="country_code" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="country_name">COUNTRY NAME</label></td>
                    <td><input type="text" id="country_name" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="country_desc">DESCRIPTION</label></td>
                    <td><textarea id="country_desc" cols="33" class="text ui-widget-content ui-corner-all"></textarea></td>
                </tr>
            </table>            
        </div>
        
        
        <div id="bdc_entry_dailog" title="BDC ENTRY">
            <table>
                <tr>
                    <td><label for="bdc_code">BDC CODE</label></td>
                    <td><input type="text" id="bdc_code" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="bdc_name">BDC NAME</label></td>
                    <td><input type="text" id="bdc_name" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="bdc_ctr_code">COUNTRY</label></td>
                    <td><select id="bdc_ctr_code" class="text ui-widget-content ui-corner-all">
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
                    <td><label for="bdc_desc">DESCRIPTION</label></td>
                    <td><textarea id="bdc_desc" cols="33" class="text ui-widget-content ui-corner-all"></textarea></td>
                </tr>
            </table>            
        </div>
        
        <div id="depot_entry_dailog" title="DEPOT ENTRY">
            <table>
                <tr>
                    <td><label for="depot_code">DEPOT CODE</label></td>
                    <td><input type="text" id="depot_code" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="depot_name">DEPOT NAME</label></td>
                    <td><input type="text" id="depot_name" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="depot_ctr_code">COUNTRY</label></td>
                    <td><select id="depot_ctr_code" class="text ui-widget-content ui-corner-all">
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
                    <td><label for="depot_desc">DESCRIPTION</label></td>
                    <td><textarea id="depot_desc" cols="33" class="text ui-widget-content ui-corner-all"></textarea></td>
                </tr>
            </table>            
        </div>
        
        
        <div id="omc_entry_dailog" title="OMC ENTRY">
            <table>
                <tr>
                    <td><label for="omc_code">OMC CODE</label></td>
                    <td><input type="text" id="omc_code" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="omc_name">OMC NAME</label></td>
                    <td><input type="text" id="omc_name" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="omc_ctr_code">COUNTRY</label></td>
                    <td><select id="omc_ctr_code" class="text ui-widget-content ui-corner-all">
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
                    <td><label for="omc_desc">DESCRIPTION</label></td>
                    <td><textarea id="omc_desc" cols="33" class="text ui-widget-content ui-corner-all"></textarea></td>
                </tr>
            </table>            
        </div>
        
        <div id="transporter_entry_dailog" title="TRANSPORTER ENTRY">
            <table>
                <tr>
                    <td><label for="transporter_code">TRANSPORTER CODE</label></td>
                    <td><input type="text" id="transporter_code" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="transporter_name">TRANSPORTER NAME</label></td>
                    <td><input type="text" id="transporter_name" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="transporter_ctr_code">COUNTRY</label></td>
                    <td><select id="transporter_ctr_code" class="text ui-widget-content ui-corner-all">
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
                    <td><label for="transporter_desc">DESCRIPTION</label></td>
                    <td><textarea id="transporter_desc" cols="33" class="text ui-widget-content ui-corner-all"></textarea></td>
                </tr>
            </table>            
        </div>
        
        <div id="product_entry_dailog" title="PRODUCT ENTRY">
            <table>
                <tr>
                    <td><label for="product_code">PRODUCT CODE</label></td>
                    <td><input type="text" id="product_code" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="product_name">PRODUCT NAME</label></td>
                    <td><input type="text" id="product_name" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="product_desc">DESCRIPTION</label></td>
                    <td><textarea id="product_desc" cols="33" class="text ui-widget-content ui-corner-all"></textarea></td>
                </tr>
            </table>            
        </div>
        
        
        
        
        
    </div>
  </div>
</div> 

<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>


<script>
    
$("#contry_entry_dailog").dialog({
   
   autoOpen: false,
    height: 300,
    width: 400,
    modal: true,
    dialogClass: 'uititle',
    
    buttons: { 
        "Create": function() {
            var country='CTR';
            var country_code = $("#country_code").val();
            var country_name = $("#country_name").val();
            var country_description = $("#country_desc").val();
            
           $.post('tom_data_entry_post.php',
           {
              ctr:country, ctr_code:country_code, ctr_name:country_name, ctr_description:country_description 
           }, function(data){
              result = $.parseJSON(data);
              if(result === '1'){
                  alert('Data successfully saved.');
                  $("#country_code").val('');
                  $("#country_name").val('');
                  $("#country_desc").val('');
                  location.reload();
              } else if (result === '-1'){
                  alert('Invalid data');
              }
           });
            
        },
        "Cancel": function(){
           $(this).dialog("close");
        }
    }
    
});    

$("#bdc_entry_dailog").dialog({
   
   autoOpen: false,
    height: 350,
    width: 400,
    modal: true,
    dialogClass: 'uititle',
    
    buttons: { 
        "Create": function() {
            
            var bdc = "BDC";
            var bdc_code = $("#bdc_code").val();
            var bdc_name = $("#bdc_name").val();
            var bdc_ctr = $("#bdc_ctr_code").val();
            var bdc_description = $("#bdc_desc").val();
            
            $.post('tom_data_entry_post.php', 
            {
               bdc:bdc, dbccode:bdc_code, bdcname:bdc_name, bdcctr:bdc_ctr, bdcdesc:bdc_description 
            }, function(data){
                result = $.parseJSON(data);
                if(result === '1'){
                    alert('Data successfully saved.');
                    $("#bdc_code").val('');
                    $("#bdc_name").val('');
                    $("#bdc_ctr_code").val('');
                    $("#bdc_desc").val('');
                    location.reload();
                } else if (result === '-1'){
                    alert('Invalid data');
                }
            });
            
        },
        "Cancel": function(){
           $(this).dialog("close");
        }
    }
    
});    

$("#depot_entry_dailog").dialog({
   
   autoOpen: false,
    height: 350,
    width: 400,
    modal: true,
    dialogClass: 'uititle',
    
    buttons: { 
        "Create": function() {
            
            var depot="DEPOT";
            var depot_code = $("#depot_code").val();
            var depot_name = $("#depot_name").val();
            var depot_ctr = $("#depot_ctr_code").val();
            var depot_description = $("#depot_desc").val();
            
            $.post('tom_data_entry_post.php',
            {
              depot:depot, depotcode:depot_code, depotname:depot_name, depotctr:depot_ctr, depotdesc:depot_description  
            }, function(data){
                result = $.parseJSON(data);
                if(result === '1'){
                    alert('Data successfully saved.');
                    $("#depot_code").val('');
                    $("#depot_name").val('');
                    $("#depot_ctr_code").val('');
                    $("#depot_desc").val('');
                    location.reload();
                } else if (result === '-1'){
                    alert('Invalid data');
                }
            });
        },
        "Cancel": function(){
           $(this).dialog("close");
        }
    }
    
});    

$("#omc_entry_dailog").dialog({
   
   autoOpen: false,
    height: 350,
    width: 400,
    modal: true,
    dialogClass: 'uititle',
    
    buttons: { 
        "Create": function() {
         
         var omc = 'OMC';
         var omc_code = $("#omc_code").val();
         var omc_name = $("#omc_name").val();
         var omc_ctr = $("#omc_ctr_code").val();
         var omc_desc = $("#omc_desc").val();
         $.post('tom_data_entry_post.php',
         {
           omc:omc,omccode:omc_code,omcname:omc_name,omcctr:omc_ctr,omcdesc:omc_desc    
         }, function(data){
             result = $.parseJSON(data);
              if(result === '1'){
                  alert('Data successfully saved.');
                  $("#omc_code").val('');
                  $("#omc_name").val('');
                  $("#omc_ctr_code").val('');
                  $("#omc_desc").val('');
                  location.reload();
              } else if (result === '-1'){
                  alert('Invalid data');
              }
         });
         
        },
        "Cancel": function(){
           $(this).dialog("close");
        }
    }
    
});    

$("#transporter_entry_dailog").dialog({
   
   autoOpen: false,
    height: 350,
    width: 400,
    modal: true,
    dialogClass: 'uititle',
    
    buttons: { 
        "Create": function() {
          
          var trans = 'TRANSPORTER';
          var trans_code = $("#transporter_code").val();
          var trans_name = $("#transporter_name").val();
          var trans_ctr = $("#transporter_ctr_code").val();
          var trans_description = $("#transporter_desc").val();
          
          $.post('tom_data_entry_post.php',
          {
            trans:trans, transcode:trans_code, transname:trans_name, transctr:trans_ctr, transdesc:trans_description  
          }, function(data){
              result = $.parseJSON(data);
              if(result === '1'){
                  alert('Data successfully saved.');
                  $("#transporter_code").val('');
                  $("#transporter_name").val('');
                  $("#transporter_ctr_code").val('');
                  $("#transporter_desc").val('');
                  location.reload();
              } else if (result === '-1'){
                  alert('Invalid data');
              }
          });
          
        },
        "Cancel": function(){
           $(this).dialog("close");
        }
    }
    
});    

$("#product_entry_dailog").dialog({
   
   autoOpen: false,
    height: 300,
    width: 400,
    modal: true,
    dialogClass: 'uititle',
    
    buttons: { 
        "Create": function() {
          
          var prod = 'PRODUCT';
          var prod_code = $("#product_code").val();
          var prod_name = $("#product_name").val();
          var prod_description = $("#product_desc").val();
          
          $.post('tom_data_entry_post.php',
          {
            prod:prod, prodcode:prod_code, prodname:prod_name, proddesc:prod_description   
          }, function(data){
              result = $.parseJSON(data);
              if(result === '1'){
                  alert('Data successfully saved.');
                  $("#product_code").val('');
                  $("#product_name").val('');
                  $("#product_desc").val('');
                  location.reload();
              } else if (result === '-1'){
                  alert('Invalid data');
              }
          });          
        },
        "Cancel": function(){
           $(this).dialog("close");
        }
    }
    
});  


$("#country_entry_button").click(function(){
   $( "#contry_entry_dailog" ).dialog( "open" );    
});

$("#bdc_entry_button").click(function(){
   $( "#bdc_entry_dailog" ).dialog( "open" );  
});

$("#depot_entry_button").click(function(){
   $( "#depot_entry_dailog" ).dialog( "open" );  
});

$("#omc_entry_button").click(function(){
   $( "#omc_entry_dailog" ).dialog( "open" );  
});

$("#transporter_entry_button").click(function(){
   $( "#transporter_entry_dailog" ).dialog( "open" );  
});

$("#product_entry_button").click(function(){
   $( "#product_entry_dailog" ).dialog( "open" );  
});

    
</script>
