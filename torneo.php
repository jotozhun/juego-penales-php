<?php
include 'navbar.php';
include 'middlewares/ConnectionSettings.php';


if($login == 1)
{
   if($isadmin = 0)
      echo " <meta http-equiv='refresh' content='0; url=home.php'>";
        
   else{
      if(isset($_POST["crearTorneoSubmit"])){
         //Check connection
         if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
         }

         //variables submited by user
         $nombre_torneo = $_POST["nombre_torneo"];
         $fecha_inicio = $_POST["fecha_inicio"];
         $fecha_fin = $_POST["fecha_fin"];
         $num_participantes = $_POST["num_participantes"];
         $num_goles = $_POST["num_goles"];
         $tiempo_espera = $_POST["tiempo_espera"];
         $tiempo_patear = $_POST["tiempo_patear"];

         $sqlCrearTorneo = "INSERT INTO torneo (nombre_torneo,
                                                fecha_inicio,
                                                fecha_fin,
                                                num_participantes,
                                                num_goles,
                                                tiempo_espera,
                                                tiempo_patear) 
                                                VALUES ('$nombre_torneo',
                                                        '$fecha_inicio',
                                                        '$fecha_fin',
                                                        '$num_participantes',
                                                        '$num_goles',
                                                        '$tiempo_espera',
                                                        '$tiempo_patear')";

         if(mysqli_query($conn, $sqlCrearTorneo))
         {
            echo "Torneo creado exitosamente!";
         }
         else{
            echo "Error en crear torneo";
         }

         mysqli_close($conn);
      }
?>

<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   <meta charset="utf-8">
   <!--Custom styles-->
   <link rel="stylesheet" type="text/css" href="styles/torneo.css">


   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!------ Include the above in your HEAD tag ---------->
   
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    

</head>
<body>
   <div class="d-flex justify-content-around bg-primary">
      <form action="torneo.php" method="post">
         <h1 class="wv-heading--title pt-4">
            Crea un torneo!
         </h1>
         <div class="form-group pt-4">
            <label for="nombreTorneo">Nombre del torneo</label>
            <input type="text" name="nombre_torneo" class="form-control" id="nombreTorneo" required>
         </div>
         <div class="form-group">
            <label for="inicioDateTorneo">Fecha de inicio</label>
            <input type="datetime-local" name="fecha_inicio" class="form-control" id="inicioDateTorneo" required>
         </div>
         <div class="form-group">
            <label for="finalDateTorneo">Fecha fin</label>
            <input type="datetime-local" name="fecha_fin" class="form-control" id="finalDateTorneo" required>
         </div>
         <div class="form-group">
            <label for="maxParticipantes">Máximo número de participantes</label>
            <input type="number" name="num_participantes" class="form-control" id="maxParticipantes" min="0" required>
         </div>
         <div class="form-group">
            <label for="numGoles">Número de goles por partido</label>
            <input type="number" name="num_goles" class="form-control" id="numGoles" min="0" max="10" required>
         </div>
         <div class="form-group">
            <label for="tiempoPresentarse">Tiempo de espera para presentarse</label>
            <input placeholder="minutos" name="tiempo_espera" type="number" class="form-control" id="tiempoPresentarse" min="0" required>
         </div>
         <div class="form-group">
            <label for="tiempoPatear">Tiempo de espera para patear el balón</label>
            <input placeholder="segundos" name="tiempo_patear" type="number" class="form-control" id="tiempoPatear" min="0" required>
         </div>
         <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
         </div>
         <button type="submit" name="crearTorneoSubmit" class="btn btn-dark w-100">Crear</button>
      </form>
   </div>
</body>
<?php
}}
?>