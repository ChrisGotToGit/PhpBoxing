<?php

session_start();

if ($_SESSION['user']=='inloggad'){

    $Rubrik = $_POST['Rubrik'];
    $Event = $_POST['Event'];
    $Datum = $_POST['Datum'];
    $Info = $_POST['Info'];

    if ($Datum == NULL){
        $Datum="0000-00-00";
}

    $db=mysqli_connect('localhost', '***', '***', "***") or die('Error connecting to database server');
    $db -> set_charset("utf8"); 
    $query = "INSERT INTO forening (rubrik, tillStallning, datum, Info) VALUES ('$Rubrik', '$Event', '$Datum', '$Info')";
    
    $result = mysqli_query($db,$query) or die('Kunde inte läsa från tabellen');

    mysqli_close($db);

    header("Location: test.php");
    exit;

}

?>
