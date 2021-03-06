<?php include('template/header.php')?>

<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtContact=(isset($_POST['txtContact']))?$_POST['txtContact']:"";
$txtDescrip=(isset($_POST['txtDescrip']))?$_POST['txtDescrip']:"";
$txtPlace=(isset($_POST['txtPlace']))?$_POST['txtPlace']:"";
$txtFoto=(isset($_FILES['txtFoto']['name']))?$_FILES['txtFoto'] ['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$typeAni=(isset($_POST['typeAni']))?$_POST['typeAni']:"";
$dateLost=(isset($_POST['dateLost']))?$_POST['dateLost']:"";


include('config/db.php');

switch($accion){
case "Agregar":

      $qsql= $connection->prepare( "INSERT INTO mascotas (tipo_masc,nombre,foto,contacto,fecha_reg,lugar,descrip,estado,id_usuario) VALUES(:tipo_masc,:nombre,:foto,:contacto,:fecha_reg,:lugar,:descrip,1,:id);" );
      $qsql->bindParam(':nombre',$txtNombre);
      $qsql->bindParam(':contacto',$txtContact);
      $qsql->bindParam(':lugar',$txtPlace);
      $qsql->bindParam(':descrip',$txtDescrip);
      $qsql->bindParam(':id',$idUsers);
      $qsql->bindParam(':tipo_masc',$typeAni);
      $qsql->bindParam(':fecha_reg',$dateLost);
    

      $date=new DateTime();
      $fileName=($txtFoto!="")?$date->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"foto.jpg";
      $tmpFoto=$_FILES["txtFoto"]["tmp_name"];
      if($tmpFoto!=""){

        move_uploaded_file($tmpFoto,"../img/".$fileName);
      }
      $qsql->bindParam(':foto',$fileName);
      $qsql->execute();

    
  
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


    move_uploaded_file($tmpFoto,"../img/".$fileName);

    $qsql=$connection->prepare("SELECT foto FROM mascotas WHERE id=:id");
    $qsql->bindParam(':id',$txtID);
    $qsql->execute();
    $dog=$qsql->fetch(PDO::FETCH_LAZY);

    if(isset($dog["foto"]) &&($dog["foto"]!="foto.jpg") ){

        if(file_exists("../img/".$dog["foto"])){
           
            unlink("../img/".$dog["foto"]);

        }
    }


    $qsql=$connection->prepare( "UPDATE mascotas SET foto=:foto WHERE id=:id");
    $qsql->bindParam(':foto',$txtFoto);
    $qsql->bindParam(':id',$txtID);
    $qsql->execute();

}
echo "<script> window,location.href='perdidos.php';</script>";

        break;


 case "Cancelar":
    echo "<script> window,location.href='perdidos.php';</script>";
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

            if(file_exists(".../img/".$dog["foto"])){
               
                unlink("../img/".$dog["foto"]);

            }
        }

        $qsql=$connection->prepare( "DELETE FROM mascotas WHERE id=:id");
        $qsql->bindParam(':id',$txtID);
        $qsql->execute();
     
        
        break;
}

$qsql=$connection->prepare( "SELECT * FROM mascotas WHERE id_usuario=:id");
$qsql->bindParam(':id',$idUsers);
$qsql->execute();
$doglist=$qsql->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="page">



    

   
    <form method="POST" enctype="multipart/form-data">
        
        <div class="formiNew">

        <!--- Tipo de mascota -->
        <div class="formiDog">
        <section>
				<select id="typeAni" name="typeAni" class="cs-select cs-skin-circular" onchange="alert('test')">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				
				</select>
			</section>
        </div>

<!--  Old version

        <label for="typeAni">Tipo</label>   
            <select class="inputs" id="typeAni" name="typeAni">
                <option value="1">Gato</option>
                <option value="2">Perro</option>
             </select>
        </div>
-->
<!--- El nombre de las mascota perdida -->
    <div class="form-dis">
<label for="txtNombre">Nombre</label>
    <input type="text" class="inputs" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre">
    </div>

<!--- Indicar fecha-->

<div class="form-dis">

<label for="txtPlace">??Cuando se perdio?</label>
<input type="date" class="inputs" name="dateLost" id="dateLost" >

</div>
  
<!--- Indicar ubicaci??n, posible integraci??n con gmaps y marks -->

<div class="form-dis">

<label for="txtPlace">??Donde lo viste por ??ltima vez?</label>
<input type="text" class="inputs" value="<?php echo $txtPlace;?>" name="txtPlace" id="txtPlace">
</div>

<!--- Datos de contacto -->
<div class="form-dis">

<label for="txtContact">Contacto</label>
<input type="text" class="inputs" value="<?php echo $txtContact;?>" name="txtContact" id="txtContact" placeholder="Contacto">
   
</div>

<!--- Descripci??n -->
<div class="form-dis">
   
<label for="txtDescrip">Descripci??n</label>
<input type="text" class="inputs-des" value="<?php echo $txtDescrip;?>" name="txtDescrip" id="txtDescrip" placeholder="Mencionar caracteristicas distintivas">

</div>

<div class="form-dis">
<label class="label-img" for="txtFoto"></label>

<?php
if($txtFoto!=""){
?>
<img src="../img/<?php echo $txtFoto;?>" width="50" alt="" srcset=""> 
<?php }?>

<input type="file" class="inputs-archi" name="txtFoto" id="txtFoto">

<div class='b-but' role="group" aria-label="">
    <button type="submit" name="accion"  value="Agregar" class="btn btn-primary">Agregar</button>
         <!-- <button type="submit" name="accion"  value="Modificar" class="btn btn-warning">Modificar</button> -->
    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
</div>
</div>
</div>
    </form>

<!-- Visualizaci??n de mascotas cargadas 

<div class="sec1">
<div class="sec2">

-->

</div>
</div>

</div>
<script src="../javascript/classie.js"> </script>
<script src="../javascript/selectFx.js"> </script>

<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el, {
						stickyPlaceholder: false,
						onChange: function(val){
							var img = document.createElement('img');
							img.src = 'img/'+val+'.png';
							img.onload = function() {
								document.querySelector('span.cs-placeholder').style.backgroundImage = 'url(img/'+val+'.png)';
							};
                            if (val>0){
                                const div = document.createElement("div");
div.textContent = "Esto es un div insertado con JS.";

const app = document.createElement("div"); // <div></div>
const formi = document.querySelector('.formiDog')
app.className = "next";       // <div id="app"></div>
app.appendChild(div);
formi.appendChild(app);
                            }
                            else{
                                alert ('No seleccionaste nada');
                            }
						}
                    
					});
				} );
			})();

</script>
<script src="../javascript/perdidos.js"> </script>

<?php include('template/footer.php')?>