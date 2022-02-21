<?php

include("../admin/config/db.php");
$qsql=$connection->prepare("SELECT * FROM mascotas");
$qsql->execute();
$dogList=$qsql->fetchALL(PDO::FETCH_ASSOC);


foreach($dogList as $dog) { 
    

  echo "
  
  <div class='user-ch'>
  <img src='../img/".$dog['foto']."' alt=''>
  <span></span>
  <p>" .$dog['nombre']."</p>

  </div>
 
";
}
?>