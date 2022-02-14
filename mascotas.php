<?php include("template/header.php") ?>
<?php 
include("admin/config/db.php");
$qsql=$connection->prepare("SELECT * FROM mascotas");
$qsql->execute();
$dogList=$qsql->fetchALL(PDO::FETCH_ASSOC);


?>

<?php foreach($dogList as $dog) { ?>
    <div class="col-md-3">

    <div class="cards-paws">
    <div class="disa">
        <img class="img-dog" src="./img/<?php echo $dog['foto']; ?>" alt="">
    </div>
        <div class="cards-text">
            <h4 class="card-title"><?php echo $dog['nombre']; ?> </h4>
            <p class="card-text">Text</p>
            <a name="" id="" class="btn btn-warning" href="#" role="button">Información</a>
        </div>
    </div>


</div>
<?php } ?>
<?php include("template/footer.php") ?>

