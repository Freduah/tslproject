<?php $title = 'TSL PLAIN DEPOT'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/nav/body_dec_nav.php'; ?>

<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">		
        <div id="banner-secondary" class="row">
            <div class="downloads-box four columns push-eight">
              Some message here
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
    
    
    
    $( "#loginbtn" ).click(function(){
       var valid = true; 
       var username = $( "#user-login-email" ).val();
       var userpass = $( "#user-login-pass" ).val();
       
       if(username === ''){
          $( "#lbl_login_alter" ).html("User name can not be empty");
          $( "#lbl_login_alter" ).css('color','red');
          valid = false;
       } else if(userpass === ''){
           $( "#lbl_login_alter" ).html("Password can not be empty");
           $( "#lbl_login_alter" ).css('color','red');
          valid = false; 
       }
       
       if( valid ) {           
           
           $("form#user_login_form").submit();
       }      
        
    });

});

</script>
