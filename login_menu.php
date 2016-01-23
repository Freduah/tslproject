<?php session_start(); ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/nav/body_dec_nav.php'; ?>

<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">		
        <div id="banner-secondary" class="row">
            <div class="downloads-box four columns push-eight">
                <table>
                    <tr>
                        <td><input type="button" id="tom_watch_button" class="styled-login-menu-button" value="TOM WATCH TRUCKS STATUS" /></td>
                    </tr> 
                    <tr>
                        <td><input type="button" id="tom_watch_dataentry_button" class="styled-login-menu-button" value="TOM SAFETY CHECK" /></td>
                    </tr>
                    <tr>
                        <td><input type="button" id="tom_data_entry_button" class="styled-login-menu-button" value="TOM DATA ENTRY" /></td>
                    </tr>
                </table>
            </div>
            <div class="features-box row eight columns pull-four">
                <table>
                    <tr>
                        <td><input type="button" id="data_entry_button" class="styled-login-menu-button" value="DATA ENTRY" /></td>
                        <td><input type="button" id="marshaling_area_check_button" class="styled-login-menu-button" value="MARSHALING AREA" /></td>
                    </tr>
                    <tr>
                        <td><input type="button" id="safety_check_button" class="styled-login-menu-button" value="SAFETY CHECK" /></td>
                        <td><input type="button" id="terminal_entry_check_button" class="styled-login-menu-button" value="TERMINAL ENTRY CHECK" /></td>
                    </tr>
                    <tr>
                        <td><input type="button" id="gantry_area_check_button" class="styled-login-menu-button" value="GANTRY CHECK" /></td>
                        <td><input type="button" id="ullaging_area_check_button" class="styled-login-menu-button" value="ULLAGING CHECK" /></td>
                    </tr>
                    <tr>
                        <td><input type="button" id="invoice_check_button" class="styled-login-menu-button" value="INVOICE CHECK" /></td>
                        <td><input type="button" id="terminal_exit_check_button" class="styled-login-menu-button" value="TERMINAL EXIT CHECK" /></td>
                    </tr>
                </table>
                
            </div>
        </div>

        <div id="home-content" class="clearfix row">
           
            
           
        </div>  
    </div>
  </div>    
</div>  
    

<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>


<script>

$(function () {
  
  
  $(document).ready(function(){
    
    $.ajax({      
      type: "GET",
      url: "login_menu_check.php",             
      dataType: "html",                  
      success: function( data ){ 
         var result = $.parseJSON(data);
         console.log( result ); 
         if(result.userlevel === 'ADMIN'){
            $("#data_entry_button").prop('disabled', false);
            $("#marshaling_area_check_button").prop('disabled', false);
            $("#safety_check_button").prop('disabled', false);
            $("#terminal_entry_check_button").prop('disabled', false); 
            $("#gantry_area_check_button").prop('disabled', false);
            $("#ullaging_area_check_button").prop('disabled', false);
            $("#invoice_check_button").prop('disabled', false);
            $("#terminal_exit_check_button").prop('disabled', false); 
            $("#tom_watch_button").prop('disabled', false);   //tom_watch_dataentry_button
            $("#tom_watch_dataentry_button").prop('disabled', false); 
            $("#tom_data_entry_button").prop('disabled', false);
         } else if(result.userlevel === 'MANAGER'){
            $("#data_entry_button").prop('disabled', true).css('color','gray');
            $("#marshaling_area_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_entry_check_button").prop('disabled', true).css('color','gray'); 
            $("#gantry_area_check_button").prop('disabled', true).css('color','gray');
            $("#ullaging_area_check_button").prop('disabled', true).css('color','gray');
            $("#invoice_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_exit_check_button").prop('disabled', true).css('color','gray'); 
            $("#tom_watch_dataentry_button").prop('disabled', false); 
            $("#tom_watch_button").prop('disabled', false);
            $("#tom_data_entry_button").prop('disabled', false);
        } else if(result.userlevel === 'DATAENTRY'){
            $("#data_entry_button").prop('disabled', false);
            $("#marshaling_area_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_entry_check_button").prop('disabled', true).css('color','gray'); 
            $("#gantry_area_check_button").prop('disabled', true).css('color','gray');
            $("#ullaging_area_check_button").prop('disabled', true).css('color','gray');
            $("#invoice_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_exit_check_button").prop('disabled', true).css('color','gray'); 
            $("#tom_watch_button").prop('disabled', true).css('color','gray');
            $("#tom_watch_dataentry_button").prop('disabled', true).css('color','gray'); 
            $("#tom_data_entry_button").prop('disabled', false);
         } else if(result.userlevel === 'MARSHALING'){
            $("#data_entry_button").prop('disabled', true).css('color','gray');
            $("#marshaling_area_check_button").prop('disabled', false);
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_entry_check_button").prop('disabled', true).css('color','gray'); 
            $("#gantry_area_check_button").prop('disabled', true).css('color','gray');
            $("#ullaging_area_check_button").prop('disabled', true).css('color','gray');
            $("#invoice_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_exit_check_button").prop('disabled', true).css('color','gray');  
            $("#tom_watch_button").prop('disabled', true).css('color','gray');
            $("#tom_watch_dataentry_button").prop('disabled', true).css('color','gray'); 
            $("#tom_data_entry_button").prop('disabled', true).css('color','gray');
         } else if(result.userlevel === 'SAFETYCHECK'){
            $("#data_entry_button").prop('disabled', true).css('color','gray');
            $("#marshaling_area_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', false);
            $("#terminal_entry_check_button").prop('disabled', true).css('color','gray'); 
            $("#gantry_area_check_button").prop('disabled', true).css('color','gray');
            $("#ullaging_area_check_button").prop('disabled', true).css('color','gray');
            $("#invoice_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_exit_check_button").prop('disabled', true).css('color','gray');  
            $("#tom_watch_button").prop('disabled', true).css('color','gray');
            $("#tom_watch_dataentry_button").prop('disabled', true).css('color','gray'); 
            $("#tom_data_entry_button").prop('disabled', true).css('color','gray');
         } else if(result.userlevel === 'SAFETYCHECKMANUAL'){
            $("#data_entry_button").prop('disabled', true).css('color','gray');
            $("#marshaling_area_check_button").prop('disabled', false);
            $("#safety_check_button").prop('disabled', false);
            $("#safety_check_button").prop('disabled', false);
            $("#terminal_entry_check_button").prop('disabled', true).css('color','gray'); 
            $("#gantry_area_check_button").prop('disabled', true).css('color','gray');
            $("#ullaging_area_check_button").prop('disabled', true).css('color','gray');
            $("#invoice_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_exit_check_button").prop('disabled', true).css('color','gray'); 
            $("#tom_watch_button").prop('disabled', true).css('color','gray');
            $("#tom_watch_dataentry_button").prop('disabled', true).css('color','gray'); 
            $("#tom_data_entry_button").prop('disabled', true).css('color','gray');
         } else if(result.userlevel === 'TERMINALENTRYCHECK'){
            $("#data_entry_button").prop('disabled', true).css('color','gray');
            $("#marshaling_area_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_entry_check_button").prop('disabled', false); 
            $("#gantry_area_check_button").prop('disabled', true).css('color','gray');
            $("#ullaging_area_check_button").prop('disabled', true).css('color','gray');
            $("#invoice_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_exit_check_button").prop('disabled', true).css('color','gray');  
            $("#tom_watch_button").prop('disabled', true).css('color','gray');
            $("#tom_watch_dataentry_button").prop('disabled', true).css('color','gray'); 
            $("#tom_data_entry_button").prop('disabled', true).css('color','gray');
         } else if(result.userlevel === 'GANTRYCHECK'){
            $("#data_entry_button").prop('disabled', true).css('color','gray');
            $("#marshaling_area_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_entry_check_button").prop('disabled', true).css('color','gray'); 
            $("#gantry_area_check_button").prop('disabled', false);
            $("#ullaging_area_check_button").prop('disabled', true).css('color','gray');
            $("#invoice_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_exit_check_button").prop('disabled', true).css('color','gray');  
            $("#tom_watch_button").prop('disabled', true).css('color','gray');
            $("#tom_watch_dataentry_button").prop('disabled', true).css('color','gray'); 
            $("#tom_data_entry_button").prop('disabled', true).css('color','gray');
         } else if(result.userlevel === 'ULLAGINGCHECK'){
            $("#data_entry_button").prop('disabled', true).css('color','gray');
            $("#marshaling_area_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_entry_check_button").prop('disabled', true).css('color','gray'); 
            $("#gantry_area_check_button").prop('disabled', true).css('color','gray');
            $("#ullaging_area_check_button").prop('disabled', false);
            $("#invoice_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_exit_check_button").prop('disabled', true).css('color','gray'); 
            $("#tom_watch_button").prop('disabled', true).css('color','gray');
            $("#tom_watch_dataentry_button").prop('disabled', true).css('color','gray'); 
            $("#tom_data_entry_button").prop('disabled', true).css('color','gray');
         } else if(result.userlevel === 'INVOICECHECK'){
            $("#data_entry_button").prop('disabled', true).css('color','gray');
            $("#marshaling_area_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_entry_check_button").prop('disabled', true).css('color','gray'); 
            $("#gantry_area_check_button").prop('disabled', true).css('color','gray');
            $("#ullaging_area_check_button").prop('disabled', true).css('color','gray');
            $("#invoice_check_button").prop('disabled', false);
            $("#terminal_exit_check_button").prop('disabled', true).css('color','gray');  
            $("#tom_watch_button").prop('disabled', true).css('color','gray');
            $("#tom_watch_dataentry_button").prop('disabled', true).css('color','gray'); 
            $("#tom_data_entry_button").prop('disabled', true).css('color','gray');
         } else if(result.userlevel === 'TERMINALEXITCHECK'){
            $("#data_entry_button").prop('disabled', true).css('color','gray');
            $("#marshaling_area_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#safety_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_entry_check_button").prop('disabled', true).css('color','gray'); 
            $("#gantry_area_check_button").prop('disabled', true).css('color','gray');
            $("#ullaging_area_check_button").prop('disabled', true).css('color','gray');
            $("#invoice_check_button").prop('disabled', true).css('color','gray');
            $("#terminal_exit_check_button").prop('disabled', false);  
            $("#tom_watch_button").prop('disabled', true).css('color','gray');
            $("#tom_watch_dataentry_button").prop('disabled', true).css('color','gray'); 
            $("#tom_data_entry_button").prop('disabled', true).css('color','gray');
         }        
         
         
      }        
    });   
    
});


$('#data_entry_button').click(function(){
  window.location.href='truck_load_data_entry.php';
});

$('#safety_check_button').click(function(){
   window.location.href='safety_manual_check.php';
});
$("#marshaling_area_check_button").click(function(){
  window.location.href='marshaling_area_check.php';  
});
$("#terminal_entry_check_button").click(function(){
  window.location.href='terminal_entry_check.php';  
});
$("#gantry_area_check_button").click(function(){
  window.location.href='gantry_check.php';   
});
$("#ullaging_area_check_button").click(function(){
  window.location.href='ullaging_area_check.php';   
});
$("#invoice_check_button").click(function(){
  window.location.href='invoice_check_manual.php';   
});
$("#terminal_exit_check_button").click(function(){
  window.location.href='terminal_exit_check.php';   
});
$("#tom_watch_button").click(function(){
  window.location.href='tom_watch.php';   
});

$("#tom_watch_dataentry_button").click(function(){
  window.location.href='tom_watch_data_entry.php';      
});

$("#tom_data_entry_button").click(function(){
  window.location.href='tom_data_entry.php';  
});

});

</script>
