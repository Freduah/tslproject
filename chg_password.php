<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>

<?php

 if($_SERVER['REQUEST_METHOD'] === "POST"){
     
     $user_name = mysqli_real_escape_string($db_con, $_POST['username']);
     $oldpassword = md5(mysqli_real_escape_string($db_con, $_POST['oldpass']));
     $newpassword = md5(mysqli_real_escape_string($db_con, $_POST['newpass']));
     $confirmpassword = mysqli_real_escape_string($db_con, $_POST['confirmpass']);
     
     if(!empty($_POST['username']) && !empty($_POST['oldpass'])){
         
         $query = "SELECT `FirstName`,`LastName`,`UserEmail`,`UserLevel` FROM `user_account`"
                  . " WHERE UserEmail ='$user_name' AND UserPassword = '$oldpassword'";
         $result = mysqli_num_rows($db_con->query($query));
         
         if  ($result >= 1){
           
           $update = "UPDATE `user_account` SET `UserPassword` = '$newpassword' "
                   . "WHERE UserEmail ='$user_name' AND UserPassword = '$oldpassword'";
           
              if ($db_con->query($update) === TRUE) {
                  
                   $data = 'Y';
                   echo json_encode($data);
                  
              } else {
                  
                  $data = 'N';
                  echo json_encode($data);
              }       
             
         }   
        $db_con->close();  
     }
     
     
     
     
     
 }


?>