<?php
include '../middlewares/unityConnectionSettings.php';

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//variables submited by user
$logUser = $_POST["logUser"];
$logPass = $_POST["logPass"];

$sqlUser = "SELECT username from usuario where username = '$logUser'";
//$sqlEmail = "SELECT email from usuario where email = '$logUser'";
$sqlPass = "SELECT password from usuario where password = '$logPass'";

$resultUser = mysqli_query($conn, $sqlUser);
//$resultEmail = mysqli_query($conn, $sqlEmail);
$resultPass = mysqli_query($conn, $sqlPass);

if(mysqli_num_rows($resultUser) > 0 && mysqli_num_rows($resultPass) > 0){
    
    $sqlInfo = "SELECT * FROM usuario where username = '$logUser'";
    
    $resultInfo = mysqli_query($conn, $sqlInfo);
    $rows = array();
    while($row = mysqli_fetch_assoc($resultInfo)){
      $rows[] = $row;
    }

    echo json_encode($rows[0]);
}else if(mysqli_num_rows($resultUser) > 0 && mysqli_num_rows($resultPass) == 0){
  echo "Error: Contraseña incorrecta!";
}else{
  echo "Error: El usuario no existe!";
}

mysqli_close($conn);
?>