

<?php
$countries=array("India","Australia","Japan");
$stateIndia=array("Maharashtra","karnataka","Delhi");
$stateAustralia=array("sydnye","Darwin","canberra");
$stateJapan=array("Tokyo","Osaka","Hiroshima","Nagasaki");

/*if(empty($_POST["country"]))
{
  $countryErr="Please select country";
}
else
{
  $country=$_POST["country"];
}*/

if(empty($_POST["state"]))
{
  $stateErr="Please select state";
}
else
{
  $state=$_POST["state"];
}

?>
<form>
<label>Country:</label>
<select name="country">
<option value="">Select country</option>
<?php
    foreach($countries as $value) {?>
        <option value="<?php echo $value ?>" <?php  if(isset($country) && $country==$value)
        echo "selected"?>><?php echo $value ?>
        </option>
  <?php
    } 
  ?>
 
</select>
<br><br>

<!-- <label>State:</label>
<select name="state">
<option value="">Select state</option>
<?php
    foreach($countries as $countryName) { 
        if($countryName=='India') {
            foreach($stateIndia as $stateName) {?>
                <option value="<?php echo $value ?>" <?php  if(isset($state) && $state==$value)
                echo "selected"?>><?php echo $value ?>
                </option>
            <?php
            } 
        }
    	else if($countryName=='Australia') {
            foreach($stateAustralia as $stateName) {?>
                <option value="<?php echo $value ?>" <?php  if(isset($state) && $state==$value)
                echo "selected"?>><?php echo $value ?>
                </option>
            <?php
            }
    	}
    	else if($countryName=='Japan') {
            foreach($stateJapan as $stateName) {?>
            <option value="<?php echo $value ?>" <?php  if(isset($state) && $state==$value)
            echo "selected"?>><?php echo $value ?>
            </option>
            <?php 
            }
    	}

    }
?>
</select> -->
<br><br>
<?php


if(!empty($_POST["country"])){

    // Capture selected country
echo "hi";
    $country = $_POST["country"];

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




</form>
