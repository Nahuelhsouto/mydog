<?php
$userName=(isset($_POST['usuario']))?$_POST['usuario']:"";
$password=(isset($_POST['pass']))?$_POST['pass']:"";

include("./config/db.php");

session_start();
if($_POST){
   
    if(($_POST['usuario']!="") && ($_POST['pass']!="")){
    
    $qsql=$connection->prepare( "SELECT * FROM usuarios WHERE username =:userName AND password =:password");
    $qsql->bindParam(':userName',$userName);
    $qsql->bindParam(':password',$password);
    $qsql->execute();
    $userN=$qsql->fetch(PDO::FETCH_LAZY);
    
    if (!$userN) {
        echo'<script type="text/javascript">
        alert("El usuario y/o contraseña son incorrectos");
        window.location.href="index.php";
        </script>';

        return false;
        header("Location:index.php");
    }

    $userNames=$userN['username'];
    
    $passwords=$userN['password'];
    
        if (($_POST['usuario'] = $userNames) && ($_POST['pass'] = $passwords )){

            $_SESSION['usuario']="ok";
            $_SESSION['nombreUsuario'] = 'Nahu';
            header('Location:inicio.php');
        }else{
            $mensaje="El usuario y/o contraseña son incorrectos";
        }

    }else{

        $mensaje="El usuario y/o contraseña son incorrectos";
    }
   
   
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
    <div class="row">

    <div class="col-md-4">

    </div>
        <div class="col-md-4">

        <br/><br/><br/><br/><br/><br/><br/><br/>
        <div class="card">
            <div class="card-header">
                Login  
            </div>
            <div class="card-body">
<?php if(isset($mensaje)) {?>
            <div class="alert alert-info" role="alert">
                <?php echo $mensaje ?>
            </div>
           <?php }  ?>
<form method="POST">
<div class = "form-group">
<label for="exampleInputEmail1">Usuario</label>
<input type="text" class="form-control" name='usuario' aria-describedby="emailHelp" placeholder="Ingresa tu usuario">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Contraseña</label>
<input type="password" class="form-control" name="pass" placeholder="Contraseña">
</div>
<button type="submit" class="btn btn-primary">Sign In</button>
</form>



            </div>
           
        </div>
            
        </div>
        
    </div>
</div>

  </body>
</html>