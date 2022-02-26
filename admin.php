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
    <div class="clubName">Admin</div>
</div><!-- End of header-->

<?php




if ($_SESSION['user']=='inloggad'){   
  $db=mysqli_connect('localhost', 'chol0032', 'Rambo7460', "chol0032") or die('Error connecting to database server');
$db -> set_charset("utf8"); 
$sql = "SELECT * FROM forening";

$result = mysqli_query($db,$sql) or die('Kunde inte läsa från tabellen');
  ?>
<div class="addAndRemove">


<div class="addCard"> 

<div class="addCardHeader">Lägg till</div>

<form action="add.php" method="post"> 

<div><label for="Rubrik">Rubrik</label></div>
<input id="Rubrik" type="text" name="Rubrik" maxlength="100"/>
<br>
<div><label for="Event">Event</label></div>
<textarea id="Event"  cols="20" rows="15" type="text" name="Event" maxlength="500"></textarea>
<br>
<div><label for="Datum">Datum</label></div>
<input id="Datum" type="date" name="Datum"/>
<br>
<div><label for="Info">Info</label></div>
<textarea id="Info" cols="20" rows="3" type="text" name="Info" maxlength="100"></textarea>
<br>

<input type="submit" id="rullGardRadera" value="Lägg till">

</form>
</div>


<div class="removeCard">

<div class="addCardHeader">Ta bort</div>

  <form  method="get" action="remove.php">  

    <select id="rullGard" name="delete">
      <?php while ($row = mysqli_fetch_array($result)) { 
      ?>
      <option value="<?php echo $row['rubrik'];?>"><?php echo $row['rubrik'];?></option>
      <?php } ?>

      </select>
      <input id="rullGardRadera" type="submit" value="Radera">

      </form>
</div>
</div><!-- End of addAndRemove-->
<?php
}
mysqli_close($db);

?>

</body>
</html>