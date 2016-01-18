<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>

<nav id="main" class="constrain clearfix">
<div class="menu-top-container">
    <ul id="menu-top" class="menu">
        <table>
            <tr>
                <td><input type="button" id="btn_add_truck_for_load" class="styled-data-entry-button" value="NEW" /></td>
                <td>    </td>
                <td>
                    <?php
                    if($_SERVER['REQUEST_METHOD'] === 'GET'){
                         if(!empty($_SESSION['login_user_name'])){

                            $user_name = $_SESSION['login_user_name'];
                            $currDate = date("Y-m-d");

                            $numoftrucks = "SELECT * FROM `tsl_truck_load` WHERE DATE(ENTRYDATE) ='$currDate' AND CREATEDBY = '$user_name'";
                            $bostresults = "SELECT * FROM `tsl_truck_load` WHERE DATE(ENTRYDATE) ='$currDate' AND BDC='BOST' AND CREATEDBY = '$user_name'";
                            $bdcresults = "SELECT * FROM `tsl_truck_load` WHERE DATE(ENTRYDATE) ='$currDate' AND BDC!='BOST' AND CREATEDBY = '$user_name'";
                            $totnumtrucks = mysqli_num_rows($db_con->query($numoftrucks));
                            $numoftrucksbost = mysqli_num_rows($db_con->query($bostresults));
                            $numoftrucksbdc = mysqli_num_rows($db_con->query($bdcresults));

                            echo "<p style='float: right; color: white;'>Total Number of Trucks: $totnumtrucks  =>  Number of Trucks By ( BOST: $numoftrucksbost  BDC: $numoftrucksbdc )</p>";

                            //$db_con->close();                 
                         }           
                    }
                    ?>                     
                </td>            
            </tr>            
        </table>       
        
        
       
    </ul>
</div>
    <table>
        <tr>
            <td>  </td>
        </tr>
    </table>
</nav>