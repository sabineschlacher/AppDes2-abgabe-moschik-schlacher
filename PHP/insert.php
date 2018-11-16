<!DOCTYPE html>

<?php
include("connect.php");
include("Mysql.class.php");
include("MysqlStatement.class.php");
?>

<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include jQuery Mobile stylesheets -->
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <!-- Include the jQuery library -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Include the jQuery Mobile library -->
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

	<?php
/**
 * DEBUG:
 * echo $MysqlStatement_delete->sql; Anzeige SQL Statement
 */

/* get the mysql object */
$Mysql = new Mysql();


/* settings data if a new version is out there and the std STP ID */
//SELECT * FROM user WHERE name="matthias" AND pw="1234";
$tile = $_POST["title"];
$first = $_POST["first"];
$last = $_POST["last"];
$company = $_POST["company"];
$address = $_POST["address"];
$postal = $_POST["postal"];
$city = $_POST["city"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$pw = $_POST["pw"];



$sql = "INSERT INTO customers (title, first, last, company, address, postal, city, phone) VALUES (:0, :1, :2, :3, :4, :5, :6, :7)";
$MysqlStatement_select = $Mysql->getMysqlStatement($sql);
$MysqlStatement_select->execute($title, $first, $last, $company, $address, $postal, $city, $phone);

echo "<br /> SQL Statement: <br/>" . $MysqlStatement_select->sql;


$last_insert_id = $Mysql->insert_id;
echo "<br />lalala" . $last_insert_id;


$sql = "INSERT INTO customer_login (email, pw) VALUES (:0, :1)";
$MysqlStatement_select = $Mysql->getMysqlStatement($sql);
$MysqlStatement_select->execute($email, $pw);

echo "<br /> SQL Statement: <br/>" . $MysqlStatement_select->sql;

?>



</body>
</html>
