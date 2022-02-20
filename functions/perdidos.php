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

include('../admin/config/db.php');

$qsql=$connection->prepare( "SELECT * FROM mascotas WHERE id_usuario=:id");
$qsql->bindParam(':id',$idUsers);
$qsql->execute();
$doglist=$qsql->fetchAll(PDO::FETCH_ASSOC);


foreach($doglist as $dog){
              
echo "<div class='cards-paws-design'>
    <img class='img-cat' src='../img/".$dog['foto']."' alt=''>
    <span>".$dog['nombre']."</span>
    <span >Se perdio en ".$dog['lugar']." </span>
    <span >Comunicate al ".$dog['contacto']." </span>
    
    <form method='post'>
    <input type='hidden' name='txtID' id='txtID' value='".$dog['id']."'>
    <input type='submit' name='accion' value='Eliminar' class='btn btn-danger'>

    </form>
</div>
";
}
?>