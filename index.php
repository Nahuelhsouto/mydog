<?php include("template/header.php")?>
<?php include("admin/config/db.php");

$qsql=$connection->prepare("SELECT * FROM mascotas");
$qsql->execute();
$dogList=$qsql->fetchALL(PDO::FETCH_ASSOC);

?>



    <?php include("template/footer.php")?>