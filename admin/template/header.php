<?php
session_start();
    if (!isset($_SESSION['usuario'])){
       header("Location:../index.php");
    } else{

        if($_SESSION['usuario']=="ok"){
        $nombreUsuario=$_SESSION["nombreUsuario"];
        $idUsers=$_SESSION["id"];

      
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      

<?php $url="http://".$_SERVER['HTTP_HOST']."/proyecto1" ?>



<header class="header fixed-top">	    
        <div class="branding">
            <div class="container-fluid position-relative">
				<nav class="navbar navbar-expand-lg">
                    <div class="site-logo"><a class="navbar-brand" href="index.php"><img class="logo-icon me-2" src="template/img/paw.png" alt="logo"><span class="logo-text">Lost&<span class="text-alt">Paws</span></span></a></div>    

                 
					<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
	                    <span> </span>
	                    <span> </span>
	                    <span> </span>
	                </button>
					
					<div class="navbar-collapse py-3 py-lg-0 collapse" id="navigation" style>
						
						<ul class="navbar-nav ms-lg-auto">
							<li class="nav-item me-lg-4">
							    <a class="nav-link" href="<?php echo $url;?>/admin/inicio.php">Inicio</a>
							</li>
							<li class="nav-item dropdown me-lg-4">
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Mascotas
						        </a>
                    <ul class="dropdown-menu rounded shadow menu-animate slideIn" aria-labelledby="navbarDropdown">
						            <li><a class="dropdown-item has-icon" href="<?php echo $url;?>/admin/sections/mascotas.php"><span style="color:tomato;" class="theme-icon-holder me-2"><i class="fas fa-paw fa-fw"></i></span>Mascotas</a></li>
						          
						            <li><div class="dropdown-divider m-0"></div></li>
						            
						            <li><a class="dropdown-item has-icon" href="#"><span style="color:tomato;" class="theme-icon-holder me-2"><i class="fas fa-cat fa-fw"></i></span>Gatos</a></li>
						            <li><a class="dropdown-item has-icon" href="#"><span  style="color:tomato;"class="theme-icon-holder me-2"><i class="fas fa-dog fa-fw"></i></span>Perros</a></li>
						        </ul>
						    </li>
							<li class="nav-item me-lg-4">
							    <a class="nav-link" href="nosotros.php">Nosotros</a>
							</li>
							<li class="nav-item me-lg-4">
							    <a class="nav-link" href="Done.php">Donativos</a>
							</li>
							<li class="nav-item me-lg-4">
							   <a class="nav-link" href="admin/index.php">Login</a>
							</li>
							<li class="nav-item me-lg-0 mt-3 mt-lg-0">
							   <a class="btn btn-danger text-white" href="signup.php">Sign up</a>
							</li>
						</ul>
					</div>
				</nav>

            </div><!--//container-->
        </div><!--//branding-->
    </header> 
<!-- <nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#">Admin <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/admin/inicio.php">Inicio</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/admin/sections/mascotas.php">Mascotas</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/admin/sections/cerrar.php">Cerrar</a>
        <a class="nav-item nav-link" href="<?php echo $url; ?>">Sitio</a>
    </div>
</nav> -->

<div class="container">
    <div class="row">