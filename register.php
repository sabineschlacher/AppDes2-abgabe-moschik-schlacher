<?php
	$registerdata = $_POST['data'];

	$company = $registerdata[0];
	$gender = $registerdata[1];
	$last = $registerdata[2];
	$first = $registerdata[3];
	$tel = $registerdata[4];
	$street = $registerdata[5];
	$postal = $registerdata[6];
	$city = $registerdata[7];
	$email = $registerdata[8];
	$pw = $registerdata[9];

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

	$sql = "INSERT INTO customers (title, first, last, company, address, postal, city, phone) VALUES ('$gender', '$first', '$last', '$company', '$street', '$postal', '$city', '$tel')";

	if ($conn->query($sql) === TRUE) {
	    $lastid = mysqli_insert_id($conn);
	    $sql_2 = "INSERT INTO customer_login (email, pw, customer_id) VALUES ('$email', '$pw', '$lastid')";
	    if ($conn->query($sql_2) === TRUE) {
	    	echo "Nutzer erstellt";
	    }
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
