<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TSL Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">     

  </head>
  <body>
  <div class="modal show" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">TSL PD AMIN</h4>
      </div>
      <div class="modal-body">
          
          <form id="tsladminLoginForm" name="tsladminLoginForm" class="form-horizontal" action="db_admin_login.php" method="post" >
            <div class="form-group">
              <label for="login_user" class="col-sm-2 control-label">User</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" id="login_user" name="login_user" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="login_password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="adminloginbtn" id="adminloginbtn" class="btn btn-default" onclick="return empty()">Log in</button>
              </div>
            </div>
              
              <script type="text/javascript">
                function empty() {
                    var username;
                    var userpass;
                    username = document.getElementById("login_user").value;
                    userpass = document.getElementById("login_password").value;
                    if (username === "" || username === null) {
                        alert("Please user name field");
                        return false;
                    } else if (userpass === "" || userpass === null) {
                        alert("Please password field");
                        return false;
                    };
                }
              </script>
          </form>             
      </div>
    </div>
  </div>
</div>
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
  </body>
</html>