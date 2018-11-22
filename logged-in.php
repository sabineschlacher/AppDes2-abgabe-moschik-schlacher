!DOCTYPE html>

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

    <link rel="stylesheet" type="text/css" href="assets/slick/slick.css"/>
   
                

</head>
<body>



<?php
/**
 * DEBUG:
 * echo $MysqlStatement_delete->sql; Anzeige SQL Statement
 */

/* get the mysql object */
$Mysql = new Mysql();


//get products

    $sql = "SELECT name, name_latin, description, price FROM products WHERE availability=:0";
    $MysqlStatement_select_products = $Mysql->getMysqlStatement($sql);
    $MysqlStatement_select_products->execute(1); //nur produkte mit availability 1 werden angezeigt
  

?>

<div data-role="navbar" id="menu">



</div> 
<!-- ende navbar -->


<div data-role="page" id="home">
    <div data-role="header">
        <h1>Einkaufen</h1>

    </div>

    <?php

    echo $MysqlStatement_select_products->sql; 

    ?>

<!--<div class="product-slider">
 <?php
  while ($products = $MysqlStatement_select_products->fetchArray()) {
        echo "<br /> <div > " . $products['name'] . "</div>";
        echo "<div > " . $products['name_latin'] . "</div>";
        echo "<div > " . $products['description'] . "</div>";
        echo "<div > €" . $products['price'] . "/100g</div>";
        
        }
    ?>
</div>-->

<div class="product-slider">
    <div>Slide 1</div>
    <div>Slide 2</div>
</div>
    

        <a href="PHP/logout.php" data-transition="none">abmelden</a>


</div>




 <script type="text/javascript" src="assets/slick/slick.min.js"></script>
 <script> 

$(document).ready(function(){
  $('.product-slider').slick({
    infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
  });
});
</script>

</body>
</html>

