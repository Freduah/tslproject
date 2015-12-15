<?php session_start();  ?>
<?php require_once 'db_con_admin.php';  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>TSLPD Activate User</title>

    <link rel="stylesheet" href="css/style.css">  
    <link rel="stylesheet" href="css/jquery-ui.css"> 

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    
  </head>   
  <body>  
    <div id="user_activate_dialog" title="User Activation">   
    <form id="user_activation_form">     
      <fieldset>
        <label for="user_name">User Name</label>
        <input type="text" id="user_name"  class="text ui-widget-content ui-corner-all" />
        <label for="user_level">User Level</label>           
        <select id="user_level" class="text ui-widget-content ui-corner-all" />
            <option value="">---</option>
            <option value="ADMIN">ADMINISTRATOR</option>
            <option value="MANAGER">MANAGER</option>
            <option value="DATAENTRY">DATA ENTRY</option>
            <option value="DASHBOARD">DASHBOARD</option>
            <option value="MARSHALING">MARSHALING</option>
            <option value="SAFETYCHECK">SAFETY CHECK</option>
            <option value="SAFETYCHECKMANUAL">SAFETY CHECK MANUAL</option>
            <option value="TERMINALENTRYCHECK">TERMINAL ENTRY</option>
            <option value="GANTRYCHECK">GANTRY CHECK</option>
            <option value="ULLAGINGCHECK">ULLAGING CHECK</option>
            <option value="INVOICECHECK">INVOICE CHECK</option>
            <option value="TERMINALEXITCHECK">TERMINAL EXIT</option>            
        </select>          
        <label for="user_pd_site">Plain Depot</label>
        <select id="user_pd_site" class="text ui-widget-content ui-corner-all" />
            <option value="">---</option>
            <option value="ALL_PD">ALL PLAIN DEPOT</option>
            <option value="APD">ACCRA PLAIN DEPOT</option>
            <option value="KPD">KUMASI PLAIN DEPOT</option>
            <option value="BPD">BOLGA PLAIN DEPOT</option>
        </select>  
        <input type="checkbox" id="chk_activate_user"> Activate <br>
     </fieldset>   
    </form>            
    </div> 

  </body>   
</html>


<?php
 if($_SERVER['REQUEST_METHOD'] === "POST"){

     //if(!empty($_POST['username']) && !empty($_POST['userlevel']) && !empty($_POST['pdsite']) && !empty($_POST['isactive'])){
         
        $username = mysqli_real_escape_string($db_con,$_POST['username']); 
        $userlevel =  mysqli_real_escape_string($db_con,$_POST['userlevel']);
        $pdsite = mysqli_real_escape_string($db_con,$_POST['pdsite']); 
        $isactive =  mysqli_real_escape_string($db_con,$_POST['isactive']);
        $adminuser = mysqli_real_escape_string($db_con,$_SESSION['admin_user']);
        $modifieddate = date('Y-m-d H:i:s');
        echo $username;
                
        $sql = "UPDATE user_account SET UserLevel='$userlevel', UserPdSite='$pdsite', IsActive='$isactive',"
                . " ModifiedBy='$adminuser', ModifiedDate='$modifieddate' WHERE UserEmail = '$username'";
        
        if ($db_con->query($sql) === TRUE) {
            echo $data  = '1';
        } else {
            echo $data = '-1';
        }

        $db_con->close();
         
     //}    
 }

?>






<script>
    
$( function () {
    
    $( "#user_activate_dialog" ).dialog({
        autoOpen: true,
        height: 300,
        width: 300,
        modal: true,
        
        buttons : {
            "Activate": function(){
                
                var user_name = $( "#user_name" ).val();
                var user_level = $( "#user_level" ).val();
                var pd_site = $( "#user_pd_site" ).val();
                var is_active = $( "#chk_activate_user:checked" ).val();
               
               $.post("activate_user.php",
                {
                   username:user_name, userlevel:user_level, pdsite:pd_site, isactive:is_active 
                   
                },
                function(data) {
                   if(data = '1'){
                       alert('User info successfully updated');
                   }  else if(data = '-1'){
                       alert('Invalid data');
                   }
                
               });                
            },
            "Cancel": function(){
              $( "#user_activate_dialog" ).dialog('close');  
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
    
    
    
});

</script>

