<?php session_start();  ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/nav/safety_manual_check_nav.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/db/con_db.php'; ?>


<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">
        
        
    <div id="home-content-scroll" class="clearfix row">
    
        <?php   

        if($_SERVER['REQUEST_METHOD'] === 'GET') {

            if(!empty($_SESSION['login_user_name']))
            {
             $user_name = $_SESSION['login_user_name'];
             $curr_date = date('Y-m-d H:i:s');

             $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id, t.SNO,t.TRUCKNO,t.TRANSPORTER,t.DRIVERNAME,t.CAPACITY, "
                     . "t.PRODUCT, t.GENBARCODE, t.BDC,t.ENTRYDATE  FROM tsl_truck_load AS t, "
                     . "(SELECT @i:=0) AS foo WHERE DATE(t.ENTRYDATE)=DATE('$curr_date')-1 ORDER BY t.SNO DESC LIMIT 15";

             $result = $db_con->query($query);

             echo "<table id='tbl_truck_safety_manual_check' style='margin-left:auto; margin-right:auto;'>
             <thead>
               <tr>
                 <th data-priority='1'>NO</th>
                 <th data-priority='1'>SNO</th>
                 <th data-priority='2'>TRUCK NO</th>
                 <th data-priority='3'>TRANSPORTER</th>
                 <th data-priority='4'>DRIVER NAME</th>
                 <th data-priority='6'>CAPACITY</th>
                 <th data-priority='7'>PRODUCT</th>
                 <th data-priority='8'>BDC</th>
                 <th data-priority='8'>BARCODE NO</th>
                 <th data-priority='9'>ENTRY DATE</th>
                 <th data-priority='9'>Check</th>
               </tr>
             </thead>
             <tbody>";
               while($row = $result->fetch_assoc()) {
                echo " <tr> ";
                echo " <td>" . $row['ROWNUM'] . "</td>";
                echo " <td>" . $row['SNO'] . "</td>";
                echo " <td>" . $row['TRUCKNO'] . "</td>";
                echo " <td>" . $row['TRANSPORTER'] . "</td>";
                echo " <td>" . $row['DRIVERNAME'] . "</td>";
                echo " <td>" . $row['CAPACITY'] . "</td>";
                echo " <td>" . $row['PRODUCT'] . "</td>";
                echo " <td>" . $row['BDC'] . "</td>";
                echo " <td>" . $row['GENBARCODE'] . "</td>";
                echo " <td>" . $row['ENTRYDATE'] . "</td>";
                echo " <td> <input type=button id=btn_print></button></td>";
                echo " </tr> "; 
               }

              echo "</tbody>
               </table>";

             $db_con->close();   
            } 
        } else {
            
            
            
        }

       ?>    
    
    </div>
   
        <div id="truck_safety_check_manual_dialog" title="Truck Safety Check">
            
             <form id="truck_entry_and_load_form">
                <label id="lbl_truck_entry_and_load_alert"></label>
                <fieldset>
                    <label for="truck_number">TRUCK NUMBER</label>
                    <input type="text" id="truck_number" value="" class="text ui-widget-content ui-corner-all">
                    
                    <label for="serial_number">SERIAL NUMBER</label>
                    <input type="text" id="serial_number" value="" class="text ui-widget-content ui-corner-all">
                    
                    <label for="safety_check">SAFETY CHECK</label>
                    <select id="safety_check" class="text ui-widget-content ui-corner-all">
                        <option value=" ">----</option>
                        <option value="Y">Passed</option>
                        <option value="N">Rejected</option>
                    </select>
                    
                    <label for="rejection_reason">REJECTION REASON</label>
                    <select id="rejection_reason" class="text ui-widget-content ui-corner-all">
                        <option value=" ">----</option>
                        <option value="TIME">Time Constraint</option>
                        <option value="REJECTION">Rejection</option>
                    </select>
                    
                    <label for="query_comment">Comments</label>
                    <textarea id="query_comment" cols="35" class="text ui-widget-content ui-corner-all"></textarea>
                    
                
                </fieldset> 
            
        </div>    
        
        
        
        
    </div>
  </div>
</div>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>


<script>

$(document).ready(function(){
    
    $.ajax({      
      type: "GET",
      url: "safety_manual_check.php",             
      dataType: "html",                  
      success: function(){ 
            
      }        
    });   
    
});


$("#tbl_truck_safety_manual_check td").click(function() {     
 
        var col_num = parseInt( $(this).index() ) + 1;
        var row_num = parseInt( $(this).parent().index() )+1;   
        var barcode_text =  $(this).closest('tr').find('td:eq(8)').text(); 
        var serial_number = $(this).closest('tr').find('td:eq(1)').text(); 
        var truck_number = $(this).closest('tr').find('td:eq(2)').text(); 
        if(col_num === 11 && row_num !== null){
        
            $.get("safety_check_manual_get.php", 
            {
              serialno:serial_number, truckno:truck_number, barcodeno:barcode_text 
            },
            function( data ){
               var result = $.parseJSON(data);
               $( "#truck_safety_check_manual_dialog" ).dialog( "open" ); 
               
               $( "#truck_number" ).val(result.truckno);
               $( "#serial_number" ).val(result.serialnum);

            });
        }
});


$( "#truck_safety_check_manual_dialog" ).dialog({
                   
        autoOpen: false,
        height: 470,
        width: 330,
        modal: true,
        dialogClass: 'uititle',
        
        buttons: { 
            "Yes": function() {   
              var valid = true;  
              var truckno = $( "#truck_number" ).val();
              var serialno = $( "#serial_number" ).val();
              var has_passed_safety = $( "#safety_check" ).val();
              var rejection = $( "#rejection_reason" ).val();
              var comments = $( "#query_comment" ).val();
              
                           
              if (valid)
              {
                    $.post("safety_check_manual_get.php", 
                    {
                       truknumber:truckno, serialnumber:serialno, pass_safety:has_passed_safety, rejectionreason:rejection, query_comments:comments 
                    },
                    function( data ){
                        console.log(has_passed_safety);
                       if(data === '1'){
                           alert('Data successfully saved.');
                       } 
                       else if(data === '-1'){

                       }
                    });
              }
        
            },
            "No": function() { 
               $(this).dialog("close");
               location.reload();
            }
        }
});


$('#safety_check').change(function() {
    if ($(this).val() === 'Y') {
        $("#rejection_reason").prop('disabled', true);
        $("#query_comment").prop('disabled', true);
    }
    else if ($(this).val() === 'N'){
        $("#rejection_reason").prop('disabled', false);
        $("#query_comment").prop('disabled', false);
    }
});




</script>
