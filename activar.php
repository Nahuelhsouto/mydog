<?php include("template/header.php") ?>
<?php 


include('admin/config/db.php');
?>

<?php
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verificar datos
    $email =($_GET['email']); // Asignar el correo electrónico a una variable
    $hash = ($_GET['hash']); // Asignar el hash a una variable
                 

    $qsql= $connection->prepare( "SELECT mail, hash_u, activo FROM usuarios WHERE mail='".$email."' AND hash_u='".$hash."' AND activo='0'" );
    $qsql->execute();
    $verify=$qsql->fetchALL(PDO::FETCH_ASSOC);
                 
    if(($verify['mail'] = $email) && ($verify['hash_u'] = $hash)){
        // Hay una coincidencia, activar la cuenta
        $sqql= $connection->prepare( "UPDATE usuarios SET activo='1' WHERE mail='".$email."' AND hash_u='".$hash."' AND activo='0'" );
        $sqql->execute();
        echo '<div class="statusmsg">Tu cuenta ha sido activada, ya puedes iniciar sesión.</div>';
    }else{
        // No hay coincidencias
        echo '<div class="statusmsg">La URL es inválida  o ya has activado tu cuenta.</div>';
    }
}else{
    // Intento nó válido (ya sea porque se ingresa sin tener el hash o porque la cuenta ya ha sido registrada)
    echo '<div class="statusmsg">Intento inválido, por favor revisa el mensaje que enviamos correo electrónico</div>';
}
?>