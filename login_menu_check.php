<?php session_start();  ?>

<?php 

    if($_SERVER['REQUEST_METHOD'] === "GET"){
        
        if(!empty($_SESSION['login_user_name']) && !empty($_SESSION['userlevel'])){
            
            $login_name = $_SESSION['login_user_name'];
            $user_level = $_SESSION['userlevel'];

            $data = array('loginname' => $login_name, 'userlevel' => $user_level);

            echo json_encode($data);
            
        }
       
    }
    
?>

