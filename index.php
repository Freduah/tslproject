<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/nav/body_dec_nav.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>



<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">		
        <div id="banner-secondary" class="row">
                <div class="downloads-box four columns push-eight">
                    <p></p>
                </div>
                <div class="features-box row eight columns pull-four">
                 
                    <form id="user_login_form" class="form-horizontal" action="user_log_in_sucess.php" method="POST">
                    <label id="lbl_login_alter"></label>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                          <input type="email" class="text ui-corner-all ui-widget-content" id="user-login-email" name="user-login-email" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                          <input type="password" class="text ui-corner-all ui-widget-content" id="user-login-pass" name="user-login-pass" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                         
                      </div>
                    </div>
                  </form>
                   <button type="submit" id="loginbtn" onclick="return false;" class="button btn btn-default">Log in</button>
                   <button id="btn_useradd" class="button btn btn-default">Sign Up</button>
                </div>
        </div>

        <div id="home-content" class="clearfix row">
            
            
            <?php 
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if(!empty ($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['uname']) && !empty($_POST['upass'])){

                        $fname = mysqli_real_escape_string($db_con,$_POST['fname']);
                        $lname = mysqli_real_escape_string($db_con,$_POST['lname']);
                        $uname = mysqli_real_escape_string($db_con,$_POST['uname']);
                        $upass = md5(mysqli_real_escape_string($db_con,$_POST['upass']));
                        $ucomment = mysqli_real_escape_string($db_con,$_POST['ucomments']);
                        
                        
                        $query = "SELECT * FROM user_account WHERE UserEmail ='$uname' LIMIT 1";
                        $result = mysqli_num_rows($db_con->query($query));
                        
                        
                        if ($result == 0){
                            
                            $email_to = 'famponsah@tslimited.com';
                            $subject = 'User Activation';
                            $headers = "From: " . $uname . "\r\n" . "CC: bswamy@tsllimited.com";

                            $sql = "INSERT INTO user_account (FirstName, LastName, UserEmail, UserPassword, UserComment) VALUES ('$fname', '$lname', '$uname', '$upass', '$ucomment')";

                            if ($db_con->query($sql) === TRUE) {
                                                            
                               mail($email_to, $subject, $ucomment, $headers);                               
                               
                            } else {
                               echo "Error: " . $sql . "<br>" . $db_con->error;
                            }
                            $db_con->close();                               
                        } 
                        $db_con->close();
                    }                        
                }
            ?>

           
        </div>  
    </div>
  </div>    
</div>

<div id="user_reg_dialog" title="User Registration">
<form id="user_reg_form" name="user_reg_form">
   <label id="lbl_alert"></label>
   <fieldset>
    <label for="user_first_name">Fisrt Name</label>
    <input type="text" id="user_first_name" value="" class="text ui-widget-content ui-corner-all">
    <label for="user_last_name">Last Name</label>
    <input type="text" id="user_last_name" value="" class="text ui-widget-content ui-corner-all">

    <label for="user_name">User Name/Email</label>
    <input type="email" id="user_name" value="" class="text ui-widget-content ui-corner-all">

    <label for="user_password">Password</label>
    <input type="password" id="user_password" value="" class="text ui-widget-content ui-corner-all">

    <label for="user_confirm">Confirm Password</label>
    <input type="password" id="user_confirm" value="" class="text ui-widget-content ui-corner-all">
    
    <label for="user_comments">User Group</label>
    <textarea id="user_comments" name="user_comments" cols="39" class="text ui-widget-content ui-corner-all" ></textarea>
    
   </fieldset>        
</form>
</div>
 



<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>

  
  <script>
      
    $(function() {
      $( "#user_reg_dialog" ).dialog({
        autoOpen: false,
        height: 570,
        width: 350,
        modal: true,
        dialogClass: 'uititle',
        
        show: {
          effect: "blind",
          duration: 1000
        },
        hide: {
          effect: "explode",
          duration: 1000
        },
        buttons: { 
            "Create": function(){
                
                var valid = true;
         
                var first_name = $( "#user_first_name" ).val();
                var last_name = $( "#user_last_name" ).val();
                var u_name = $( "#user_name" ).val();
                var u_password = $( "#user_password" ).val();
                var u_confirm = $( "#user_confirm" ).val();
                var u_comments = $( "#user_comments").val();
                console.log('First Name :' + first_name + ' Last Name ' + last_name + ' User Name :' + u_name +
                        ' Password :' + u_password + ' Confirm :' + u_confirm);

                if(first_name === ''){
                    $('#lbl_alert').html("First name can not be empty.");
                    $('#lbl_alert').css('color','red');
                    valid = false;
                } else if(last_name === ''){
                    $('#lbl_alert').html("Last name can not be empty.");
                    $('#lbl_alert').css('color','red');
                    valid = false;
                } else if(u_name === ''){
                    $('#lbl_alert').html("User name Name can not be empty.");
                    $('#lbl_alert').css('color','red');
                    valid = false;
                } else if(u_password === ''){
                    $('#lbl_alert').html("Password can not be empty.");
                    $('#lbl_alert').css('color','red');
                    valid = false; 
                } else if(u_confirm === ''){
                    $('#lbl_alert').html("Confirm password can not be empty.");
                    $('#lbl_alert').css('color','red');
                    valid = false;    
                } else if(u_comments === ''){
                    $('#lbl_alert').html("User comments can not be empty.");
                    $('#lbl_alert').css('color','red');
                    valid = false;              
                } else if(u_password !== u_confirm){
                    $('#lbl_alert').html("Password do not match.");
                    $('#lbl_alert').css('color','red');
                    valid = false;
                } else if( !isValidEmailAddress( u_name ) ) {
                    $('#lbl_alert').html("Invalid e-mail address.");
                    $('#lbl_alert').css('color','red');
                    valid = false;
                }

                if( valid ){
                   $.post("index.php",
                       {
                           fname:first_name, lname:last_name, uname:u_name, upass:u_password, uconfirm:u_confirm, ucomments:u_comments
                       },
                      function( data ){

                          if(data.username === "inuse"){
                              console.log(data.username);
                              alert('User already exists!');

                          } else {
                             console.log(data.username); 
                           $( "#user_first_name" ).val('');
                           $( "#user_last_name" ).val('');
                           $( "#user_name" ).val('');
                           $( "#user_password" ).val('');
                           $( "#user_confirm" ).val(''); 
                           $( "#user_comments" ).val(''); 
                           $('#lbl_alert').html("");
                           $( "#user_reg_dialog" ).dialog( "close" ); 

                          }
                   });            
                }
                
                
            },
            "Cancel": function(){
              $( "#user_reg_dialog" ).dialog( "close" );
              location.reload();
            }                
        }     
        
      });
      
      //Validate email
      function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
      };

      //Check password confirmation
      $("#user_confirm").change(function(){
            if($(this).val() !== $("#user_password").val()){
                $('#lbl_alert').html("Password do not match");
                $('#lbl_alert').css('color','red');
            } else{
               $('#lbl_alert').html("Password matches");
               $('#lbl_alert').css('color','green'); 
            }
       });
       
       
       // Check if user exists        
       $( "#user_name" ).on('input', function() {
           
           var chkuser = $( "#user_name" ).val();
          
          $.post("user_exists.php", 
          {
             chk_user:chkuser
          }, function( data ){
             
             if(data === 'inuse'){
                 alert('User already exists!!');
                $( "#user_name" ).val(''); 
                $( "#user_name" ).css('background','red');
             } else {
                 
                $( "#user_name" ).css('background','white');  
             }
            
             
          });
          
       });     
       
       
      
      //posting the form
      $( "#reg_user" ).click(function(){
         
        var valid = true;
         
         var first_name = $( "#user_first_name" ).val();
         var last_name = $( "#user_last_name" ).val();
         var u_name = $( "#user_name" ).val();
         var u_password = $( "#user_password" ).val();
         var u_confirm = $( "#user_confirm" ).val();
         var u_comments = $( "#user_comments").val();
         console.log('First Name :' + first_name + ' Last Name ' + last_name + ' User Name :' + u_name +
                 ' Password :' + u_password + ' Confirm :' + u_confirm);
         
         if(first_name === ''){
             $('#lbl_alert').html("First name can not be empty.");
             $('#lbl_alert').css('color','red');
             valid = false;
         } else if(last_name === ''){
             $('#lbl_alert').html("Last name can not be empty.");
             $('#lbl_alert').css('color','red');
             valid = false;
         } else if(u_name === ''){
             $('#lbl_alert').html("User name Name can not be empty.");
             $('#lbl_alert').css('color','red');
             valid = false;
         } else if(u_password === ''){
             $('#lbl_alert').html("Password can not be empty.");
             $('#lbl_alert').css('color','red');
             valid = false; 
         } else if(u_confirm === ''){
             $('#lbl_alert').html("Confirm password can not be empty.");
             $('#lbl_alert').css('color','red');
             valid = false;    
         } else if(u_comments === ''){
             $('#lbl_alert').html("User comments can not be empty.");
             $('#lbl_alert').css('color','red');
             valid = false;              
         } else if(u_password !== u_confirm){
             $('#lbl_alert').html("Password do not match.");
             $('#lbl_alert').css('color','red');
             valid = false;
         } else if( !isValidEmailAddress( u_name ) ) {
             $('#lbl_alert').html("Invalid e-mail address.");
             $('#lbl_alert').css('color','red');
             valid = false;
         }
         
         if( valid ){
            $.post("index.php",
                {
                    fname:first_name, lname:last_name, uname:u_name, upass:u_password, uconfirm:u_confirm, ucomments:u_comments
                },
               function( data ){
                   
                   if(data.username === "inuse"){
                       console.log(data.username);
                       alert('User already exists!');
                       
                   } else {
                      console.log(data.username); 
                    $( "#user_first_name" ).val('');
                    $( "#user_last_name" ).val('');
                    $( "#user_name" ).val('');
                    $( "#user_password" ).val('');
                    $( "#user_confirm" ).val(''); 
                    $( "#user_comments" ).val(''); 
                    $('#lbl_alert').html("");
                    $( "#user_reg_dialog" ).dialog( "close" ); 
                       
                   }
            });            
         } 
         
         
         
        }); // End of jquery posting

      $( "#btn_useradd" ).click(function() {
        $( "#user_reg_dialog" ).dialog( "open" );
      });
      
      
      
  
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
  
  
  
