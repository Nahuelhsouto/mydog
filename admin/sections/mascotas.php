<?php include('../template/header.php')?>

<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtContact=(isset($_POST['txtContact']))?$_POST['txtContact']:"";
$txtPlace=(isset($_POST['txtPlace']))?$_POST['txtPlace']:"";
$txtFoto=(isset($_FILES['txtFoto']['name']))?$_FILES['txtFoto'] ['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include('../config/db.php');

switch($accion){
case "Agregar":

      $qsql= $connection->prepare( "INSERT INTO mascotas (nombre,foto,contacto,lugar,id_usuario) VALUES(:nombre,:foto,:contacto,:lugar,:id);" );
      $qsql->bindParam(':nombre',$txtNombre);
      $qsql->bindParam(':contacto',$txtContact);
      $qsql->bindParam(':lugar',$txtPlace);
      $qsql->bindParam(':id',$idUsers);

      $date=new DateTime();
      $fileName=($txtFoto!="")?$date->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"foto.jpg";
      $tmpFoto=$_FILES["txtFoto"]["tmp_name"];
      if($tmpFoto!=""){

        move_uploaded_file($tmpFoto,"../../img/".$fileName);
      }
      $qsql->bindParam(':foto',$fileName);
      $qsql->execute();

      header("Location:mascotas.php");
  
      break;


case "Modificar":
        $qsql=$connection->prepare( "UPDATE mascotas SET nombre=:nombre WHERE id=:id");
        $qsql->bindParam(':nombre',$txtNombre);
        $qsql->bindParam(':id',$txtID);
        $qsql->execute();

        $qsql=$connection->prepare( "UPDATE mascotas SET contacto=:contacto WHERE id=:id");
        $qsql->bindParam(':contacto',$txtContact);
        $qsql->bindParam(':id',$txtID);
        $qsql->execute();

        $qsql=$connection->prepare( "UPDATE mascotas SET lugar=:lugar WHERE id=:id");
        $qsql->bindParam(':lugar',$txtPlace);
        $qsql->bindParam(':id',$txtID);
        $qsql->execute();


if ($txtFoto!=""){

    $date=new DateTime();
    $fileName=($txtFoto!="")?$date->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"foto.jpg";
    $tmpFoto=$_FILES["txtFoto"]["tmp_name"];


    move_uploaded_file($tmpFoto,"../../img/".$fileName);

    $qsql=$connection->prepare("SELECT foto FROM mascotas WHERE id=:id");
    $qsql->bindParam(':id',$txtID);
    $qsql->execute();
    $dog=$qsql->fetch(PDO::FETCH_LAZY);

    if(isset($dog["foto"]) &&($dog["foto"]!="foto.jpg") ){

        if(file_exists("../../img/".$dog["foto"])){
           
            unlink("../../img/".$dog["foto"]);

        }
    }


    $qsql=$connection->prepare( "UPDATE mascotas SET foto=:foto WHERE id=:id");
    $qsql->bindParam(':foto',$txtFoto);
    $qsql->bindParam(':id',$txtID);
    $qsql->execute();

}
header("Location:mascotas.php");

        break;


 case "Cancelar":
        header("Location:mascotas.php");
        break;


case "Seleccionar":
        $qsql=$connection->prepare( "SELECT * FROM mascotas WHERE id=:id");
        $qsql->bindParam(':id',$txtID);
        $qsql->execute();
        $dog=$qsql->fetch(PDO::FETCH_LAZY);
        
    
        $txtNombre=$dog['nombre'];
        $txtContact=$dog['contacto'];
        $txtPlace=$dog['lugar'];
        $txtFoto=$dog['foto'];

        break;
    case "Eliminar":

        $qsql=$connection->prepare("SELECT foto FROM mascotas WHERE id=:id");
        $qsql->bindParam(':id',$txtID);
        $qsql->execute();
        $dog=$qsql->fetch(PDO::FETCH_LAZY);

        if(isset($dog["foto"]) &&($dog["foto"]!="foto.jpg") ){

            if(file_exists("../../img/".$dog["foto"])){
               
                unlink("../../img/".$dog["foto"]);

            }
        }

        $qsql=$connection->prepare( "DELETE FROM mascotas WHERE id=:id");
        $qsql->bindParam(':id',$txtID);
        $qsql->execute();
     
    header("Location:mascotas.php");
        break;
}

$qsql=$connection->prepare( "SELECT * FROM mascotas WHERE id_usuario=:id");
$qsql->bindParam(':id',$idUsers);
$qsql->execute();
$doglist=$qsql->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-5">
<br/><br/><br/>
<div class="card">
    <div class="card-header">
        Mis mascotas
    </div>

    <div class="card-body">
    <form method="POST" enctype="multipart/form-data">

<div class = "form-group">

<div class="form-group">
<label for="txtNombre">Nombre</label>
<input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre">
</div>

<div class="form-group">
<label for="txtPlace">¿Donde lo viste por última vez?</label>
<input type="text" class="form-control" value="<?php echo $txtPlace;?>" name="txtPlace" id="txtPlace" placeholder="Lo vi por última vez...">
</div>

<div class="form-group">
<label for="txtContact">Contacto</label>
<input type="text" class="form-control" value="<?php echo $txtContact;?>" name="txtContact" id="txtContact" placeholder="Contacto">
</div>


<div class="form-group">
<label for="txtFoto">Foto</label>


<?php
if($txtFoto!=""){
?>

<img src="../../img/<?php echo $txtFoto;?>" width="50" alt="" srcset=""> 

<?php }?>

<input type="file" class="form-control" name="txtFoto" id="txtFoto">
</div>

<div class="btn-group" role="group" aria-label="">
    <button type="submit" name="accion"  value="Agregar" class="btn btn-primary">Agregar</button>
    <button type="submit" name="accion"  value="Modificar" class="btn btn-warning">Modificar</button>
    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
</div>




</div>


    </div>

</div>




<div class="col-md-7">
<br/><br/><br/>
    <table class="table table-bordered">
        <thead>
            <tr>
               
                <th>Nombre</th>
                <th>Lugar</th>
                <th>Contacto</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           <?php
           foreach($doglist as $dog){
           ?>
            <tr>
                <td><?php echo $dog['nombre'];?></td>
                <td><?php echo $dog['lugar'];?></td>
                <td><?php echo $dog['contacto'];?></td>
                <td>

                <img src="../../img/<?php echo $dog['foto'];?>" width="50" alt="" srcset="">    

                </td>
                <td>

                <form method="post">

                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $dog['id'];?>">
                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
                    <input type="submit" name="accion" value="Eliminar" class="btn btn-danger">

                </form>

                </td>
                <?php }?>
            </tr>
        </tbody>
    </table>
</div>


<?php include('../template/footer.php')?>