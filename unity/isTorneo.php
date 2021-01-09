<?php
require "../middlewares/ConnectionSettings.php";

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlTorneo = "SELECT * from torneo";

$resultTorneo = mysqli_query($conn, $sqlTorneo);
if(mysqli_num_rows($resultTorneo) > 0)
{
    $rows = array();
    while($row = mysqli_fetch_assoc($resultTorneo)){
        $rows[] = $row;
    }

    echo json_encode($rows[0]);
}else{
    echo "Error";
}
?>