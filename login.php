<?php $title = 'TSL PLAIN DEPOT'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/nav/body_dec_nav.php'; ?>

<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">		
        <div id="banner-secondary" class="row">
            <div class="downloads-box four columns push-eight">
                <form id="user_login_form" class="form-horizontal" action="user_log_in_sucess.php" method="POST">
                    <label id="lbl_login_alter"></label>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                          <input type="email" class="form-control" id="user-login-email" name="user-login-email" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" id="user-login-pass" name="user-login-pass" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" id="loginbtn" onclick="return false;" class=" button btn btn-default">Log in</button>
                      </div>
                    </div>
                  </form>
            </div>
            <div class="features-box row eight columns pull-four">
               
                
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
