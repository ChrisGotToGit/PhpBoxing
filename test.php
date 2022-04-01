<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="header">
<div class="navLinkDiv">

<div class="ulNav">

<form action="test.php" class="firstLink"><button class="logButton">Events</button></form>

<?php 
session_start();
 if (!isset($_SESSION['user'])){ ?>
<form action="inlog.php"><button class="logButton">Inloggning</button></form>
<?php } else if ($_SESSION['user']=='inloggad'){ ?>

<form action="admin.php" class="secondLink"><button class="logButton">Admin</button></form>

<form action="utlog.php"><button class="logButton">Utloggning</button></form>

<?php } ?>

</div>

</div>
    <div class="clubName">Ljungby <br> boxningsningsklubb</div>
</div><!-- End of header-->


<?php
$db=mysqli_connect('localhost', '***', '***', "***") or die('Error connecting to database server');
$db -> set_charset("utf8"); 
$dagens = date("Y-m-d");
$sql = "SELECT * FROM forening WHERE datum >='$dagens' ORDER BY datum ASC";

$result = mysqli_query($db,$sql) or die('Kunde inte läsa från tabellen');

?><div class="mainContnent">

<div class="eventsH">Events</div> <?php

$i=0;
while ($row = mysqli_fetch_array($result)) { $i++; ?>
<div class="event1">
    <div class="rubrik">
        <?php echo $row["rubrik"]; ?> 
    </div>
    <div class="event">
        <?php echo $row["tillStallning"]; ?> 
    </div>
    <div class="info">
        <?php echo "Ansvarig: " .$row["Info"]; ?> 
    </div>
    <div class="datum">
        <?php echo $row["datum"]; ?> 
    </div> 
</div><!-- End of event1-->
<?php if ($i == 5) {
        break;
    } } ?>

</div><!-- End of mainContnent-->
<?php 

mysqli_close($db);

?>

</body>
</html>
