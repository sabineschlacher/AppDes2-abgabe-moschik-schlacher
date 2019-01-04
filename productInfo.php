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

	//echo "funktioniert" . $_POST[productRow];

	$sql = "SELECT * FROM products WHERE availability = 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    echo '<div class="product-slider">';

	    $i = 0;

	    while($row = $result->fetch_assoc()) {

	    	if($i== $_POST[productRow]){
		        echo "<div id='product-pop-up'>" . "<div id='pop-up-text'>". $row['info'] . "</div>" . "</div>";
		    	} 

	    	$i++;

	    }

	    echo '</div>';


	} else {
	    echo "0 results";
	}
	$conn->close();
?>