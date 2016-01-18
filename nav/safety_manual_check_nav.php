
<nav id="main" class="constrain clearfix">
<div class="menu-top-container">
    <ul id="menu-top" class="menu">
        <table>
            <tr>
                <td><label style="color: white; font-weight: bold;">SERIAL NO :  </label></td>
                <td><input type="text" id="truk_serial_number" class="styled-search-textbox" /></td>
                <td><label style="color: white; font-weight: bold;">TRUCK NO : </label></td>
                <td><input type="text" id="truk_number" class="styled-search-textbox" /></td>
            </tr>
        </table>
    </ul>
</div>
</nav>


<script>
 
 $("#truk_serial_number").on('input', function(){
    
    var truk_serial_number = $("#truk_serial_number").val();
    
    $.get("safety_manual_check.php",
    
    {
        serialnumber:truk_serial_number
        
    }, function(){
      console.log(truk_serial_number);   
    });
     
 });
    
    
    
</script>