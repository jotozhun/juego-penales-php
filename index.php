<?php
include 'middlewares/ConnectionSettings.php';


if($login == 1)
{
    if($isadmin = 1)
        echo " <meta http-equiv='refresh' content='0; url=adminhome.php'>";
    else
        echo " <meta http-equiv='refresh' content='0; url=home.php'>";
}else{
    if(isset($_POST["logUserSubmit"])){
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
            $row = mysqli_fetch_array($resultInfo);

            setcookie('id_user', $row["id_user"], time() + (3600*24));
            setcookie('login', 1, time() + (3600*24));

            if($row["isadmin"] == 0){
                echo " <meta http-equiv='refresh' content='0; url=home.php'>";
            }
            else
            {
                setcookie('isadmin', 1, time() + (3600*24));
                echo " <meta http-equiv='refresh' content='0; url=adminhome.php'>";
            }
        }else if(mysqli_num_rows($resultUser) > 0 && mysqli_num_rows($resultPass) == 0){
            echo "Error: Contraseña incorrecta!";
        }else{
            echo "Error: El usuario no existe!";
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
               Entra a tu cuenta
            </h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="index.php" method="post">
                  <div class="form-group">
                    <input type="text" name="logUser"  class="form-control my-input" placeholder="Nombre de usuario" required>
                 </div>
                  <div class="form-group">
                     <input type="password" min="0" name="logPass" class="form-control my-input" placeholder="Contraseña" required>
                  </div>
                  <div class="text-center ">
                     <button type="submit" name="logUserSubmit" class=" btn btn-block send-button tx-tfm">Entrar</button>
                  </div>
                  <div class="col-md-12 ">
                     <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or">¿No tienes una cuenta?</span>
                     </div>
                  </div>
                  <div class="form-group">
                     <a class="btn btn-block g-button" href="register.php">
                     <i class="fa"></i> Crea una cuenta
                     </a>
                  </div>
                  <p class="small mt-3">By signing in, you are indicating that you have read and agree to the <a href="#" class="ps-hero__content__link">Terms of Use</a> and <a href="#">Privacy Policy</a>.
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