<?php
    include 'middlewares/ConnectionSettings.php';
    if($login == 0){
        echo " <meta http-equiv='refresh' content='0; url=index.php'>";
    }else if($isadmin == 1 && $login == 1){
        echo " <meta http-equiv='refresh' content='0; url=adminhome.php'>";
    }else{
?>

<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   <meta charset="utf-8">
   <!--Custom styles-->

   <link rel="stylesheet" type="text/css" href="styles/home.css">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


   <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">
   <!------ Include the above in your HEAD tag ---------->
   
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
</head>
<body>

<?php
    include("navbar.php");
?>

<div class="view">
    <div class="col-md-6 mx-auto text-center">
            <h1 class="wv-heading--title mb-5 pt-3">
                <?php
                    echo "Bienvenido " . $_COOKIE["username"] . "!";
                ?>
            </h1>

            <?php
                include("isTorneo.php");
            ?>
    </div>
</div>
    </body>
<?php
    }
?>