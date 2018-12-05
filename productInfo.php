<?php
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

	$sql = "SELECT * FROM products WHERE availability = 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    echo '<div class="product-slider">';

	    while($row = $result->fetch_assoc()) {

	        echo "<div>" . $row['info'] . "</div>";
	    }

	    echo '</div>';
	} else {
	    echo "0 results";
	}
	$conn->close();
?>