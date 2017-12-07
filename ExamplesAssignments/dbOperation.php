<?php
$servername = "localhost";
$username = "root";
$password = "compass";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table


$sql1 = "CREATE TABLE Employee (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
companyName VARCHAR(20)
)";


$sql = "SELECT * FROM Employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?><table>
       <td>ID</td>
       
       <td>Name</td>
       <td>Company</td><br> 
<br>       <td>
       <?php echo $row["id"]?>
       </td>
       <td>
       	<?php echo $row["firstname"]?>
       </td>
       
       <td>	<?php echo $row["companyName"]?></td>
       

       </table> 
<?php
 
    }
} else {
    echo "0 results";
}







$conn->close();
?>
