<?php include("template/header.php") ?>
<?php 
$userID=(isset($_POST['userID']))?$_POST['userID']:"";
$passID=(isset($_POST['passID']))?$_POST['passID']:"";
$mailID=(isset($_POST['mailID']))?$_POST['mailID']:"";

include('admin/config/db.php');


if($_POST){

    $pass = password_hash($passID,PASSWORD_DEFAULT);

    $qsql= $connection->prepare( "INSERT INTO usuarios (username,password,mail,hash_u,activo) VALUES(:username,:password,:mail,:hash_u,0);" );
    $qsql->bindParam(':username',$userID);
    $qsql->bindParam(':password',$pass);
    $qsql->bindParam(':mail',$mailID);
    $hash = md5( rand(0,1000) );
    $qsql->bindParam(':hash_u',$hash);
    $qsql->execute();


    $to      = $mailID; // Enviar Email al usuario
$subject = 'Signup | Verification'; // Darle un asunto al correo electrónico
$message = '
 
Gracias por registrarte!
Tu cuenta ha sido creada, activala utilizando el enlace de la parte inferior.
 
------------------------
Username: '.$userID.'
Password: '.$passID.'
------------------------
 
Por favor haz clic en este enlace para activar tu cuenta:
http://localhost/proyecto1/activar.php?email='.$mailID.'&hash='.$hash.'
'; // Aqui se incluye la URL para ir al mensaje
                     
$headers = 'From:noreply@lostandpaws.com' . "\r\n"; // Colocar el encabezado
mail($to, $subject, $message, $headers); // Enviar el correo electrónico
    
  
    // echo'<script type="text/javascript">
    //     alert("Registrado con exito!");
    //     </script>';


       


}

?>



<form method='POST'>
<div class = "form-group">
<label for="mailID">Email</label>
<input type="email" class="form-control" name="mailID" id="mailID" aria-describedby="emailHelp" placeholder="Enter email">
</div>
<div class = "form-group">
<label for="userID">Usuario</label>
<input type="text" class="form-control" name="userID" id="userID" placeholder="User">
</div>
<div class="form-group">
<label for="passID">Password</label>
<input type="password" class="form-control" name="passID" id="passID" placeholder="Password">

</br>
<button type="submit" class="btn btn-primary">Sign Up</button>
</form>

