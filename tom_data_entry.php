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
                    <td><input type="text" id="bdc_code" class="text ui-widget-content ui-corner-all" /></td>
                </tr>
                <tr>
                    <td><label for="depot_name">DEPOT NAME</label></td>
                    <td><input type="text" id="bdc_name" class="text ui-widget-content ui-corner-all" /></td>
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
