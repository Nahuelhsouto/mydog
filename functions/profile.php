<?php

$userId = $_POST['id'];

include("../admin/config/db.php");
$qsql=$connection->prepare("SELECT * FROM usuarios WHERE id = $userId");
$qsql->execute();
$userList=$qsql->fetchALL(PDO::FETCH_ASSOC);


foreach($userList as $user) { 
    

  echo " 
  <form action='#' method='POST' enctype='multipart/form-data' autocomplete='off'>
  <img src='../pictures/foto.jpg' alt=''>
  <input type='file' class='form-control' id='txtFoto'>

  <input class='inputs' type='text' value='".$user['username']."' id='userName'> 
  <input class='inputs' type='text' value='".$user['mail']."' id='userMail'>
  <input class='inputs' type='text' value='".$user['direccion']."' id='userDire'>

  <input class='save' type='file' name='image' accept='image/x-png,image/gif,image/jpeg,image/jpg>'
  </form>
";
}
?>