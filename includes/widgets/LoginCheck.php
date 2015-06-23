<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On'); 
 //session(start);
 
    if (isset($_POST['username'])) {
        // Include the databas connection script
	include_once("Core/database/connect.php");
	
	// Set the posted data from the form into local variables
        $usname = strip_tags($_POST['username']);
	$paswd = strip_tags($_POST['password']);
	
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	
	$paswd = md5($paswd); // using md5 just for testing purposes
	
	$sql = "SELECT id, username, password FROM members WHERE username = '$usname' AND activated = '1' LIMIT 1";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$dbUsname = $row[1];
	$dbPassword = $row[2];
        //echo $dbPassword;
	// Check if the username and the password they entered was correct
	if ($usname == $dbUsname && $paswd == $dbPassword) {
		// Set session 
		$_SESSION['username'] = $usname;
		$_SESSION['user'] = $uid;
		// Now direct to users feed
                //echo $dbPassword;
                //echo $uid;
		//header("Location: Core/function/users.php");

	} else {
		echo "<h2>Oops that username or password combination was incorrect.
		<br /> Please try again.</h2>";
	}
	
    }
?>

