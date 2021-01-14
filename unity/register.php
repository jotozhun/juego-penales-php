<?php
require "../middlewares/unityConnectionSettings.php";

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//variables submited by user
$regName = $_POST["regName"];
$regUser = $_POST["regUser"];
$regEmail = $_POST["regEmail"];
$regPass = $_POST['regPass'];

$sqlUser = "SELECT username from usuario where username = '$regUser'";
$sqlEmail = "SELECT email from usuario where email = '$regEmail'";

$resultUser = mysqli_query($conn, $sqlUser);
$resultEmail = mysqli_query($conn, $sqlEmail);

if(mysqli_num_rows($resultUser) > 0){
    echo "Este nombre de usuario ya existe! Escoja otro";
}else if(mysqli_num_rows($resultEmail) > 0){
    echo "Este email ya existe! Escoja otro";
}else{
    //Registrar el usuario en la base de datos
    $sqlRegister = "INSERT INTO usuario (nombre, username, email, password) VALUES ('$regName', '$regUser', '$regEmail', '$regPass')";
    if(mysqli_query($conn, $sqlRegister) == TRUE){
        echo "Usuario creado correctamente!";
    }else{
        echo "Error: " . $sqlRegister;
    }
}

mysqli_close($conn);
?>