<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_header.php'; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/nav/marshaling_check_nav.php'; ?>

<div id="content-wrapper" class="clearfix row">
  <div class="content-full full-width twelve columns">
    <div id="content">	
        
        <div id="barcode_one">            
            <form id="barcode_one_form">
                <label for="barcode_one_number">Barcode Text :</label>
                <input id="marshaling_area_check_barcode" onmouseover="this.focus();" type="text">               
            </form>            
        </div>
        
        
    </div>
  </div>
</div>    



<?php require_once $_SERVER["DOCUMENT_ROOT"] . 'tslpd/inc/tslpd_footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function() {
    var pressed = false; 
    var chars = []; 
    $(window).keypress(function(e) {
        if (e.which >= 1 && e.which <= 204) {
            chars.push(String.fromCharCode(e.which));
        }
        console.log(e.which + ":" + chars.join("|"));
        if (pressed == false) {
            setTimeout(function(){
                if (chars.length >= 3) {
                    var barcode = chars.join("");
                    var barcode_clean = barcode.replace('\r','');
                    console.log("Barcode Scanned: " + barcode_clean);
                    // assign value to some input (or do whatever you want)
                    //$("#marshaling_area_check_barcode").val(barcode);
                    
                    $.post("marshaling_area_truck_barcode.php", 
                    {
                        marshaling_barcode:barcode_clean
                    }, 
                    function( data ){
                        console.log(data);
                        if(barcode_clean == data){
                          alert('Barcode  ' + data + '  successfully checked.');   
                        } else {
                            alert('Invalid Barcode  ' + data + '  please scan again.'); 
                        }
                                                  

                    });   

                    
                    
                }
                chars = [];
                pressed = false;
            },500);
        }
        pressed = true;
    });
});

$("#marshaling_area_check_barcode").keypress(function(e){
    if ( e.which === 13 ) {
        console.log("Prevent form submit.");
        e.preventDefault();
    }
});


$(" #marshaling_area_check_barcode" ).on('input', function(){
    
    var valid = true;
    var marshaling_barcode_value = $( "#marshaling_area_check_barcode" ).val();
    
    if(valid) {
        
        $.post("marshaling_area_truck_barcode.php", 
        {
            marshaling_barcode:marshaling_barcode_value
        }, 
        function( data ){
           
                alert('Barcode. ' + data);
                $( "#marshaling_area_check_barcode" ).val('');

        });          
    }   
    
});



</script>