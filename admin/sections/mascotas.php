<?php include('../template/header.php')?>

<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtFoto=(isset($_FILES['txtFoto']['name']))?$_FILES['txtFoto'] ['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include('../config/db.php');

switch($accion){
    case "Agregar":

      $qsql= $connection->prepare( "INSERT INTO mascotas (nombre,foto) VALUES(:nombre,:foto);" );
      $qsql->bindParam(':nombre',$txtNombre);
      $qsql->bindParam(':foto',$txtFoto);
      $qsql->execute();
  
      break;
    case "Modificar":
        echo  "funciono el Modificar";
        break;
    case "Cancelar":
        echo  "funciono el Cancelar";
        break;
}

$qsql=$connection->prepare( "SELECT * FROM mascotas");
$qsql->execute();
$doglist=$qsql->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Mis mascotas
    </div>

    <div class="card-body">
    <form method="POST" enctype="multipart/form-data">

<div class = "form-group">
<label for="txtID">ID</label>
<input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
</div>

<div class="form-group">
<label for="txtNombre">Nombre</label>
<input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
</div>

<div class="form-group">
<label for="txtFoto">Foto</label>
<input type="file" class="form-control" name="txtFoto" id="txtFoto">
</div>

<div class="btn-group" role="group" aria-label="">
    <button type="submit" name="accion" value="Agregar" class="btn btn-primary">Agregar</button>
    <button type="submit" name="accion" value= "Modificar"class="btn btn-warning">Modificar</button>
    <button type="submit" name="accion" value= "Cancelar"class="btn btn-info">Cancelar</button>
</div>




</div>


    </div>

</div>




<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           <?php
           foreach($doglist as $dog){
           ?>
            <tr>
                <td><?php echo $dog['id'];?></td>
                <td><?php echo $dog['nombre'];?></td>
                <td><?php echo $dog['foto'];?></td>
                <td>Seleccionar | Borrar</td>
                <?php }?>
            </tr>
        </tbody>
    </table>
</div>


<?php include('../template/footer.php')?>