<?php include("template/header.php") ?>
<?php 
$userID=(isset($_POST['userID']))?$_POST['userID']:"";
$passID=(isset($_POST['passID']))?$_POST['passID']:"";
$mailID=(isset($_POST['mailID']))?$_POST['mailID']:"";

include('admin/config/db.php');


if($_POST){

    $qsql= $connection->prepare( "INSERT INTO usuarios (username,password,mail) VALUES(:username,:password,:mail);" );
    $qsql->bindParam(':username',$userID);
    $qsql->bindParam(':password',$passID);
    $qsql->bindParam(':mail',$mailID);
    $qsql->execute();

    echo'<script type="text/javascript">
        alert("Registrado con exito!");
        </script>';


    header("Location:admin/index.php");


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

