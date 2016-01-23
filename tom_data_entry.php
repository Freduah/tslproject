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
    </div>
  </div>
</div>    



<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>