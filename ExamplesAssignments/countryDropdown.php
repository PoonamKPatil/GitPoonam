<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'compass';
$connect = mysqli_connect($dbhost,$dbuser, $dbpass );

    // connect to databsase 

mysqli_select_db($connect,"user_db");

    if(isset($_POST["country"])){

        // Capture selected country

        $country = $_POST["country"];



        // Define country and city array

        $countryArr = array(

                        "usa" => array("New Yourk", "Los Angeles", "California"),

                        "india" => array("Mumbai", "New Delhi", "Bangalore"),

                        "uk" => array("London", "Manchester", "Liverpool")

                    );

         

        // Display city dropdown based on country name

        if($country !== 'Select'){

            echo "<label>City:</label>";

            echo "<select>";

            foreach($countryArr[$country] as $value){

                echo "<option>". $value . "</option>";

            }

            echo "</select>";

        } 

    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>jQuery Populate City Dropdown Based on Country Selected</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select.country").change(function(){
       
        var selectedCountry = $(".country option:selected").val();
        $.ajax({
            type: "POST",
            data: { country : selectedCountry } 
        }).done(function(data){
            $("#response").html(data);
        });
    });
});
</script>
</head>
<body>
<form>
    <table>
        <tr>
            <td>
                <label>Country:</label>
                <select class="country">
                    <option>Select</option>
                    <option value="usa">United States</option>
                    <option value="india">India</option>
                    <option value="uk">United Kingdom</option>
                </select>
            </td>
            <td id="response">
                <!--Response will be inserted here-->
            </td>
        </tr>
    </table>
</form>
</body> 
</html>                            


   
