<?php
    include 'middlewares/ConnectionSettings.php';

    if($login = 0)
    {
        echo " <meta http-equiv='refresh' content='0; url=index.php'>";
    }else{
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    include("navbar.php");
?>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   <meta charset="utf-8">
   <!--Custom styles-->


   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!------ Include the above in your HEAD tag ---------->
   
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   
   <link rel="stylesheet" type="text/css" href="styles/home.css">
   <link rel="stylesheet" type="text/css" href="styles/partidas.css">
</head>
<body>
    <div class="view">
<?php
        $userid = $_COOKIE['id_user'];

        $sqlUserInfo = "SELECT * from usuario where id_user = '$userid'";

        $resultUser = mysqli_query($conn, $sqlUserInfo);
        $row = mysqli_fetch_array($resultUser);

        echo
            '<div class="vertical-center">
            <div class="container info-show">
                <div class="d-flex justify-content-center">
                    <div class="col-md-5 text-center text-white ">Estadísticas de '.$row['username'].'</div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="col-md-3 text-center text-white">Partidos</div>
                    <div class="col-md-3 text-white">Goles</div>
                </div>
            
                <div class="d-flex justify-content-center">
                    <div class="col-md-3 text-center text-white">Partidos Ganados: '. $row['partidos_ganados'] .'</div>
                    <div class="col-md-3 text-white">Anotados: '. $row['goles_anotados'] .'</div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="col-md-3 text-center text-white">Partidos Perdidos: '. $row['partidos_perdidos'] .'</div>
                    <div class="col-md-3 text-white">Recibidos: '. $row['goles_recibidos'] .'</div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="col-md-3 text-center text-white">Total Partidos Jugados: '. $row['total_partidos'] .'</div>
                    <div class="col-md-3 text-white">Anotados: '. $row['goles_atajados'] .'</div>
                </div>
            </div>
            <div>'
        ;
        mysqli_close($conn);
    }
?>
    </div>
</body>