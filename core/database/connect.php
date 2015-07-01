<?php
/*$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$dbcon=mysqli_select_db($conn,"lr");
*/

$dbCon = mysqli_connect("localhost:3306", "root", "root", "tutorials");

?>

