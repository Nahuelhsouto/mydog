
<?php
include('template/header.php');
?>

<?php
$txtFoto=(isset($_FILES['txtFoto']['name']))?$_FILES['txtFoto'] ['name']:"";
$userName=(isset($_POST['userName']))?$_POST['userName']:"";
$userMail=(isset($_POST['userMail']))?$_POST['userMail']:"";
$userDire=(isset($_POST['userDire']))?$_POST['userDire']:"";

include('./config/db.php');


?>
<div class="user-container">
       <div class="user-sec">
    <div class="card-user">



    </div>

    
       </div>
       </div>

<script>
    usersId= <?php echo $idUsers?>;
    
</script>
       <script src="../javascript/profile.js"></script>


<?php
if (isset($_POST['send'])){
       $qqsql= $connection->prepare( "UPDATE usuarios set username=:username,mail=:mail,direccion=:direccion WHERE id=:id");
       $qqsql->bindParam(':id',$idUsers);
       $qqsql->bindParam(':username',$userName);
       $qqsql->bindParam(':mail',$userMail);
       $qqsql->bindParam(':direccion',$userDire);
       
     if($txtFoto!=""){

       $date=new DateTime();
       $fileName=($txtFoto!="")?$date->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"foto.jpg";
       $tmpFoto=$_FILES["txtFoto"]["tmp_name"];
       if($tmpFoto!=""){
     
         move_uploaded_file($tmpFoto,"../pictures/".$fileName);
       }
       $qsql=$connection->prepare("SELECT foto FROM usuarios WHERE id=:id");
    $qsql->bindParam(':id',$idUsers);
    $qsql->execute();
    $use=$qsql->fetch(PDO::FETCH_LAZY);

    if(isset($use["foto"]) &&($use["foto"]!="foto.jpg") ){

       if(file_exists("../pictures/".$use["foto"])){
          
           unlink("../pictures/".$use["foto"]);

       }
   }


       $qqsql= $connection->prepare( "UPDATE usuarios set foto=:foto WHERE id=:id");
       $qqsql->bindParam(':id',$idUsers);
       $qqsql->bindParam(':foto',$fileName);
       $qqsql->execute();
}
       
     }

include('template/footer.php')
        ?>