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
    <div class="clubName">Inloggning</div>
</div><!-- End of header-->



<?php 
    session_start();
?>

<div class="inlogDiv">

<form action="userCheck.php" method="post">
    <label for="fname">Namn</label><br>
    <input type="text" id="fname" name="fname">

    <br>
    <label for="fname">Lösenord</label><br>
    <input type="password" id="pwd" name="pwd">


    <br>
    <input id="rullGard" type="submit" value="Logga in" />
</form>

</div><!-- End of inlogDiv-->