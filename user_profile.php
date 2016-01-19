<?php session_start(); ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>


<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">	
        
        <table>
            <tr>
                <td>
                    <div id="user_details">
                        
                        <?php
                
                        $uname = $_SESSION['login_user_name'];
                        $query = "SELECT `FirstName`,`LastName`,`UserEmail`,`UserLevel` FROM `user_account`"
                                . " WHERE UserEmail ='$uname' ";

                        $user_details = $db_con->query($query);

                        while($row = $user_details->fetch_assoc()) {
                            $firstname = $row['FirstName'];
                            $lastname = $row['LastName'];
                            $username = $row['UserEmail'];
                            $userlevel = $row['UserLevel'];
                           
                           echo '<table>'; 
                           echo '<tr>';
                           echo '<td>First Name : </td>';
                           echo "<td><input type='text' id='firstname' value=$firstname /></td>";
                           echo '</tr>';

                           echo '<tr>';
                           echo '<td>Last Name : </td>';
                           echo "<td><input type='text' id='lastname' value=$lastname /></td>";
                           echo '</tr>';

                           echo '<tr>';
                           echo '<td>User Name : </td>';
                           echo "<td><input type='text' id='username' value=$username /></td>";
                           echo '</tr>';

                           echo '<tr>';
                           echo '<td>User Level : </td>';
                           echo "<td><input type='text' id='userlevel' value=$userlevel /></td>";
                           echo '</tr>';
                           echo '</table>';
                        }                     

                         $db_con->close(); 
                       ?>
                        
                    </div>              
                </td>
                
                <td>                    
                    <div id="change_password">
                       <table>
                        <tr>
                        <td>Old Password</td>
                        <td><input type="text" id="oldpassword" /></td>
                        </tr>  
                        <tr>
                            <td>New Password</td>
                            <td><input type="text" id="newpassword" /></td>
                        </tr> 
                        <tr>
                            <td>Confirm Password</td>
                            <td><input type="text" id="confirmpassword" /></td>
                        </tr> 
                        <tr>
                            <td></td>
                            <td><input type="button" class="styled-change-password-button" id="changepassword" value="Change password" /></td>
                        </tr>
                        </table>
                    </div>
                                       
                    
                </td>
                
            </tr>  
            
        </table>        
        
    </div>
  </div>
</div>  


<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>

<script>
    
 $(function(){
    
    $(document).ready(function(){
        
        $("#firstname").prop('disabled', true);
        $("#lastname").prop('disabled', true);
        $("#username").prop('disabled', true);
        $("#userlevel").prop('disabled', true);
        
    });    
    
    $("#changepassword").click(function(){
       var user_name = $("#username").val();
       var oldpassword = $("#oldpassword").val();
       var newpassword = $("#newpassword").val();
       var confirmpassword = $("#confirmpassword").val();
       
       $.post("chg_password.php", 
       {
           username:user_name, oldpass:oldpassword, newpass:newpassword, confirmpass:confirmpassword
       }, 
       function( data ){
           console.log(user_name + '' + oldpassword + '' + newpassword + '' + confirmpassword + ' Data=>' + $.parseJSON(data));
           var result = $.parseJSON(data);
           if(result === 'Y'){               
               alert('User profile successfully updated.');
               window.location = "index.php";
               
           } else if(result === 'N'){
              alert('User profile not updated.');
              window.location = "user_profile.php";
           }
           
       });  
       
    });
     
 });
    
    


</script>




