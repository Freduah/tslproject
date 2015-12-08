<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
 
    if(!empty($_POST['chk_user'])){
        $chkuname = mysqli_real_escape_string($db_con,$_POST['chk_user']);
        $query = "SELECT * FROM user_account WHERE UserEmail ='$chkuname' LIMIT 1";
        $result = mysqli_num_rows($db_con->query($query));
        
        $data = '';
                        
         if  ($result >= 1){
           
           echo $data = 'inuse';
             
         }   
        $db_con->close(); 
    }   
}
?>