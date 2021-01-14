<?php
require "../middlewares/unityConnectionSettings.php";

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

//variables submited by user
$id_user = $_POST["id_user"];
$total_partidos = $_POST["total_partidos"];
$partidos_ganados = $_POST["partidos_ganados"];
$partidos_perdidos = $_POST["partidos_perdidos"];
$goles_anotados = $_POST["goles_anotados"];
$goles_atajados = $_POST["goles_atajados"];
$goles_recibidos = $_POST["goles_recibidos"];

$sqlToUser = "UPDATE usuario
              SET total_partidos = '$total_partidos',
                  partidos_ganados = '$partidos_ganados',
                  partidos_perdidos = '$partidos_perdidos',
                  goles_anotados = '$goles_anotados',
                  goles_atajados = '$goles_atajados',
                  goles_recibidos = '$goles_recibidos'
              WHERE id_user = '$id_user'";

if(mysqli_query($conn, $sqlToUser)){
    echo "Información actualizada exitosamente!";
}else {
    echo "Error, no se pudo actualizar la información del usuario!";
}

mysqli_close($conn);
?>