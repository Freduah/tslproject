<?php session_start(); ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
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

                     $query = "SELECT @i:=@i+1 AS ROWNUM, t.Id, t.SNO,t.TRUCKNO,t.TRANSPORTER,t.DRIVERNAME,t.CAPACITY, "
                             . "t.PRODUCT, t.GENBARCODE, t.BDC,t.ENTRYDATE  FROM tsl_truck_load AS t, "
                             . "(SELECT @i:=0) AS foo WHERE t.HASPASSEDSAFETY !='Y' ORDER BY t.ENTRYDATE DESC";

                     $result = $db_con->query($query);

                     echo "<table id='tbl_tom_watch_truck_entry' style='margin-left:auto; margin-right:auto;'>
                     <thead>
                       <tr>
                         <th data-priority='1'>NO</th>
                         <th data-priority='2'>SNO</th>
                         <th data-priority='3'>TRUCK NO</th>
                         <th data-priority='4'>TRANSPORTER</th>
                         <th data-priority='5'>DRIVER NAME</th>
                         <th data-priority='6'>CAPACITY</th>
                         <th data-priority='7'>PRODUCT</th>
                         <th data-priority='8'>BDC</th>
                         <th data-priority='9'>BARCODE NO</th>
                         <th data-priority='10'>ENTRY DATE</th>
                         <th data-priority='11'></th>
                         <th data-priority='12'></th>
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
                        echo " <td> <input type=button id='btn_print' value='Print'></button></td>";
                        echo " <td> <input type=button id='btn_edit' value='Safe'></button></td>";
                        echo " </tr> "; 
                       }

                      echo "</tbody>
                       </table>";

                     $db_con->close();   
                    } 
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
             </form>            
        </div>

        
        
    </div>
  </div>
</div>   


<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>

<script>

$(document).ready(function(){
    
    $.ajax({      
      type: "GET",
      url: "tom_watch_data_entry.php",             
      dataType: "html",                  
      success: function(){ 
            
      }        
    });  
    
    $("#truck_number").prop('disabled', true);
    $("#serial_number").prop('disabled', true);
    $("#rejection_reason").prop('disabled', true);
});
   
$("#tbl_tom_watch_truck_entry td").click(function() {     

     var col_num = parseInt( $(this).index() ) + 1;
     var row_num = parseInt( $(this).parent().index() )+1;   
     var barcode_text =  $(this).closest('tr').find('td:eq(8)').text(); 
     var serial_number = $(this).closest('tr').find('td:eq(1)').text(); 
     var truck_number = $(this).closest('tr').find('td:eq(2)').text(); 
     if(col_num === 12 && row_num !== null){

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

          if(rejection !== ' ' && comments === ' '){                  
             alert('Comments can not be empty.');  
             valid = false; 
          } else if(has_passed_safety === 'Y' && rejection === ' '){
             valid = true;
          } else if(has_passed_safety === 'N' && rejection === ' '){
             valid = false;
             alert('Rejection reason can not be empty.');
          } else if(has_passed_safety === ' '){
              alert('Safety check can not be empty');
             valid = false;
          } 


          if (valid)
          {
                $.post("safety_check_manual_get.php", 
                {
                   truknumber:truckno, serialnumber:serialno, pass_safety:has_passed_safety, rejectionreason:rejection, query_comments:comments 
                },
                function( data ){
                    console.log(has_passed_safety);
                   if(data === '1'){

                       if(has_passed_safety === 'Y'){

                        $( "#truck_number" ).val(' ');
                        $( "#serial_number" ).val(' ');
                        $( "#safety_check" ).val(' ');
                        $( "#rejection_reason" ).val(' ');
                        $( "#query_comment" ).val(' ');  

                        alert('Truck allowed for loading.');
                        
                        location.reload();

                       } else if(has_passed_safety === 'N'){

                        $( "#truck_number" ).val(' ');
                        $( "#serial_number" ).val(' ');
                        $( "#safety_check" ).val(' ');
                        $( "#rejection_reason" ).val(' ');
                        $( "#query_comment" ).val(' ');  

                        alert('Truck rejected for loading.');  

                       }



                    $( "#truck_safety_check_manual_dialog" ).dialog("close");    
                   } 
                   else if(data === '-1'){

                   }

                });
          }

        },
        "No": function() { 
           $(this).dialog("close");
           //location.reload();
        }
    }
});


$('#safety_check').change(function() {
    if ($(this).val() === 'Y') {
        $("#rejection_reason").prop('disabled', true);
        $("#query_comment").prop('disabled', true);
        $("#rejection_reason").val(' ');
        $("#query_comment").val(' ');
    }
    else if ($(this).val() === ' ') {
        $("#rejection_reason").prop('disabled', true);
        $("#query_comment").prop('disabled', true);
    } 
    else if ($(this).val() === 'N'){
        $("#rejection_reason").prop('disabled', false);
        $("#query_comment").prop('disabled', false);
    }
});



    
</script>