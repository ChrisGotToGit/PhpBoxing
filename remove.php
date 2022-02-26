<?php


session_start();

$toDelete = $_GET['delete'];

if ($_SESSION['user']=='inloggad'){ 
   
  $db=mysqli_connect('localhost', 'chol0032', 'Rambo7460', "chol0032") or die('Error connecting to database server');
$db -> set_charset("utf8"); 
$query = "DELETE FROM forening WHERE rubrik='$toDelete'";

$result = mysqli_query($db,$query) or die('Kunde inte läsa från tabellen');
mysqli_close($db);
}

header("Location: test.php");
    exit;

?>