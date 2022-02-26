<?php

$userId = $_POST['id'];


include("../admin/config/db.php");
$qsql=$connection->prepare("SELECT * FROM usuarios WHERE id = $userId");
$qsql->execute();
$userList=$qsql->fetchALL(PDO::FETCH_ASSOC);




foreach($userList as $user) { 
    

  echo " 
  <form  method='POST' enctype='multipart/form-data' autocomplete='off'>
  
  

  <div class='cont-inp'>
<input type='file' name='txtFoto' id='txtFoto' class='inputfile inputfile-6' data-multiple-caption='{count} archivos seleccionados' multiple />
<label for='txtFoto'>
<figure>
<img src='../pictures/".$user['foto']."' alt=''>
</figure>

</label>
</div>

";
 echo"
 
 <span>Nombre de usuario</span>
  <input class='inputs' type='text' value='".$user['username']."' id='userName' name='userName'> 
 <span>Mail</span>
  <input class='inputs' type='text' value='".$user['mail']."' id='userMail' name='userMail'>
 <span>Dirección</span>
  <input class='inputs' type='text' value='".$user['direccion']."' id='userDire' name='userDire'>

  <input class='save' type='submit' name='send' value='save' /> 
  </form>
";

}


?>