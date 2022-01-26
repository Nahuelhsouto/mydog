<?php include("template/header.php")?>
<?php include("admin/config/db.php");

$qsql=$connection->prepare("SELECT * FROM mascotas");
$qsql->execute();
$dogList=$qsql->fetchALL(PDO::FETCH_ASSOC);

?>

<div class="jumbotron">
        <h1 class="display-3">Jumbo heading</h1>
        <p class="lead">Jumbo helper text</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
        </p>
    </div>


    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/1642743629_Captura de pantalla (2).png" alt="First slide">
    </div>
 
 <?php foreach($dogList as $dog){?>
    <div class="carousel-item">
      <img class="d-block w-100" src="./img/<?php echo $dog['foto'];?>" alt="Second slide">
    </div>
 <?php }?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <?php include("template/footer.php")?>