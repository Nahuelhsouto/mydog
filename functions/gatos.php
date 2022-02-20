<?php

include("../admin/config/db.php");
$qsql=$connection->prepare("SELECT * FROM mascotas WHERE tipo_masc = 1");
$qsql->execute();
$dogList=$qsql->fetchALL(PDO::FETCH_ASSOC);


foreach($dogList as $dog) { 
    

  echo " <div class='cards-paws'>
    <div >
        <img class='img-dog' src='./img/".$dog['foto']."' alt=''>
    </div>
        <div class='cards-text'>
            <h4 class='card-title'>" .$dog['nombre']."</h4>
            <p class='card-text'>Text</p>
            <a name='' id='' class='btn btn-warning' href='#' role='button'>Información</a>
        </div>
    </div>
";
}
?>