<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   <meta charset="utf-8">
   <!--Custom styles-->

   <link rel="stylesheet" type="text/css" href="styles/home.css">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!------ Include the above in your HEAD tag ---------->
   
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
</head>
<?php
require "middlewares/ConnectionSettings.php";

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
    
    echo '
    <div class="row">
        <div class="col-md-6 mx-auto">
            <button class="btn bg-info">Regístrate al torneo '. $rows[0]["nombre_torneo"] .'!</button>
        </div>
    </div>
    ';
}else{
    echo "Error";
}
?>

