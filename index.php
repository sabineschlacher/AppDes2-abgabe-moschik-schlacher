<!DOCTYPE html>

<?php
include("PHP/connect.php");
include("PHP/Mysql.class.php");
include("PHP/MysqlStatement.class.php");
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

$sql = "SELECT * FROM customer-login WHERE email=:0 AND pw=:1";
$MysqlStatement_select = $Mysql->getMysqlStatement($sql);
$MysqlStatement_select->execute($_POST[email], $_POST[pw]);

?>

<div data-role="page" id="pageone">
    <div data-role="header">
        <h1>Login</h1>

    </div>

    <div data-role="main" class="ui-content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
            Name: <input type="text" name="email"><br>
            PW: <input type="text" name="pw"><br>
            <input type="submit" value="Login">
        </form>
        <a id="link" href="#pagetwo" >Neues Konto erstellen</a>
    </div>

    <?php echo "<br /> SQL Statement: <br/>" . $MysqlStatement_select->sql; ?>

    <?php echo "<br /> NUM: " . $MysqlStatement_select->num_rows; ?>


    <?php

    echo "<br /> Beliebiger Inhalt: <br />";
    while ($data = $MysqlStatement_select->fetchArray()) {
        echo $data['content'];
    }
    ?>
</div>


<div data-role="page" id="pagetwo">
    
    <div data-role="header">
        <h1>Registrieren</h1>
    </div>

    <div data-role="main" class="ui-content">
        <a href="#pageone" data-transition="none">zurück</a>


        <form id="formular" action="PHP/insert.php" method="post">

            <input type="text" placeholder="Firma" name="company" data-mini="true" />
            <select placeholder="Anrede" name="title" data-mini="true">
                <option value="" disabled selected>Anrede</option>
                <option value="woman">Frau</option>
                 <option value="man">Herr</option>
            </select>
            <input type="text" placeholder="Name *" name="last" data-mini="true" />
            <input type="text" placeholder="Vorname *" name="first" data-mini="true" />
            <input type="number" placeholder="Telefonnummer *" name="phone" data-mini="true" />
             <input type="text" placeholder="Straße *" name="address" data-mini="true" />
            <input type="number" placeholder="PLZ *" name="postal" data-mini="true" />
            <input type="text" placeholder="Ort *" name="city" data-mini="true" />
            <input type="text" placeholder="E-Mail *" name="email" data-mini="true" />
            <input type="text" placeholder="Passwort *" name="pw" data-mini="true" />

            <input type="submit" value="Absenden" />
        </form>          
    </div>

</div>




</body>
</html>

