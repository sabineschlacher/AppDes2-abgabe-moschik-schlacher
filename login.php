<?php

	//Holt die Daten vom Ajax-Post
	$userdata = $_POST['data'];
	$name = $userdata[0];
	$pw = $userdata[1];
	

	//Verbindet mit Datenbank
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "forellen-fruhmann";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM customer_login WHERE email='".$name."' AND pw='".$pw."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        echo "1";
	    }
	} else {
	    echo "Login fehlgeschlagen";
	}
	$conn->close();
?>