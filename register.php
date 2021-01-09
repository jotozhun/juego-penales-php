<?php
include 'middlewares/ConnectionSettings.php';


if($login == 1)
{
    if($isadmin = 1)
        echo " <meta http-equiv='refresh' content='0; url=adminhome.php'>";
    else
        echo " <meta http-equiv='refresh' content='0; url=home.php'>";
}else{
if(isset($_POST["regUserSubmit"])){
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
            header("location:index.php");
            echo "Usuario creado correctamente!";
        }else{
            echo "Error: " . $sqlRegister;
        }
    }

    mysqli_close($conn);
}
?>

<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   <meta charset="utf-8">
   <!--Custom styles-->
   <link rel="stylesheet" type="text/css" href="styles/login.css">


   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!------ Include the above in your HEAD tag ---------->
   
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    

</head>
<body>
<div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Registrate amigo, es gratis!!
            </h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="register.php" method="post">
                  <div class="form-group">
                     <input type="text" name="regName"  class="form-control my-input" placeholder="Nombre completo" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="regUser"  class="form-control my-input" placeholder="Nombre de usuario" required>
                 </div>
                  <div class="form-group">
                     <input type="email" name="regEmail"  class="form-control my-input" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                     <input type="password" min="0" name="regPass" class="form-control my-input" placeholder="Contraseña" required>
                  </div>
                  <div class="text-center ">
                     <button type="submit" name= "regUserSubmit" class=" btn btn-block send-button tx-tfm">Crea una cuenta gratis</button>
                  </div>
                  <div class="col-md-12 ">
                     <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or">¿Ya tienes una cuenta?</span>
                     </div>
                  </div>
                  <div class="form-group">
                     <a class="btn btn-block g-button" href="index.php">
                     <i class="fa" src></i> Ir a login
                     </a>
                  </div>
                  <p class="small mt-3">By signing up, you are indicating that you have read and agree to the <a href="#" class="ps-hero__content__link">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                  </p>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>
<?php
}
?>