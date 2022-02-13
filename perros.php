<?php include("template/header.php") ?>
<?php 
include("admin/config/db.php");
$qsql=$connection->prepare("SELECT * FROM mascotas WHERE tipo_masc = 2");
$qsql->execute();
$dogList=$qsql->fetchALL(PDO::FETCH_ASSOC);


?>

<?php foreach($dogList as $dog) { ?>
<div class="col-md-3">

    <div class="card">
        <img class="img-dog" src="./img/<?php echo $dog['foto']; ?>" alt="">
       
        <div class="card-body">
            <h4 class="card-title"><?php echo $dog['nombre']; ?> </h4>
            <p class="card-text">Text</p>
            <a name="" id="" class="btn btn-warning" href="#" role="button">Información</a>
        </div>
    </div>

</div>
<?php } ?>

<?php include("template/footer.php") ?>

