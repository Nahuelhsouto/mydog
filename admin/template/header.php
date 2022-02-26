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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer="" src="../test/all.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/images.css">
    <link rel="stylesheet" href="../css/chat.css">
    <link rel="stylesheet" href="../css/user.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

      

<?php $url="http://".$_SERVER['HTTP_HOST']."/proyecto1" ?>



<header class="header fixed-top">	    
        <div class="branding">
            <div class="container-fluid position-relative">
				<nav class="navbar navbar-expand-lg">
                    <div class="site-logo"><a class="navbar-brand" href="index.php"><img class="logo-icon me-2" src="../template/img/paw.png" alt="logo"><span class="logo-text">Lost&<span class="text-alt">Paws</span></span></a></div>    

                 
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
						          Publicar
						        </a>
                    <ul class="dropdown-menu rounded shadow menu-animate slideIn" aria-labelledby="navbarDropdown">
						            
						            <li><a class="dropdown-item has-icon" href="<?php echo $url;?>/admin/perdidos.php""><span style="color:tomato;" class="theme-icon-holder me-2"><i class="fa-light fa-paw fa-fw"></i></span>Perdido</a></li>
						            <li><a class="dropdown-item has-icon" href="#"><span  style="color:tomato;"class="theme-icon-holder me-2"><i class="fas fa-paw fa-fw"></i></span>Encontrado</a></li>
						        </ul>
						    </li>
							<li class="nav-item dropdown me-lg-4">
								<a class="nav-link dropdown-toggle" href="#"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span style="color:tomato;" class="theme-icon-holder me-2"><i class="fas fa-user fa-fw"></i></span>
								</a>
					<ul class="dropdown-menu rounded shadow menu-animate slideIn" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item has-icon" href="<?php echo $url;?>/admin/user.php"><span style="color:tomato;" class="theme-icon-holder me-2"><i class="fas fa-user fa-fw"></i></span>Mi perfil</a></li>
								  
									<li><div class="dropdown-divider m-0"></div></li>
									
									<li><a class="dropdown-item has-icon" href="#"><span style="color:tomato;" class="theme-icon-holder me-2"><i class="fas fa-wrench fa-fw"></i></span>Configuración</a></li>
									<li><a class="dropdown-item has-icon" href="<?php echo $url;?>/admin/inbox.php"><span  style="color:tomato;"class="theme-icon-holder me-2"><i class="fas fa-inbox fa-fw"></i></span>Inbox</a></li>
									<li><a class="dropdown-item has-icon" href="<?php echo $url;?>/admin/cerrar.php"><span  style="color:tomato;"class="theme-icon-holder me-2"><i class="fas fa-door-open fa-fw"></i></span>Cerrar Sesión</a></li>
								</ul>
							</li>
							<li class="nav-item me-lg-4">
							    <a class="nav-link" href="Done.php">Donativos</a>
							</li>
			
						
						</ul>
					</div>
				</nav>

            </div><!--//container-->
        </div><!--//branding-->
    </header> 


<div class="">
    <div class="">


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>    

<script src="../test/popper.min.js"></script>
<script src="../test/bootstrap.min.js"></script>  
