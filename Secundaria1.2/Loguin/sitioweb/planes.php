<?php include("template/cabecera.php"); ?>

<?php 
    include ("administrador/config/bd.php");

    $sentenciaSQL= $conexion->prepare("SELECT * FROM planes");
    $sentenciaSQL->execute();
    $listaPlanes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>


<?php foreach($listaPlanes as $plan ) { ?>
<div class="col-md-3">
<div class="card-columns">
    <div class="card">
        <img class="card-img-top" src="./img/<?php echo $plan['imagen']; ?>" alt="">
        <div class="card-body">
            <h4 class="card-title"><?php echo $plan['nombre'];?></h4>
            <a name="" id="" class="btn btn-primary" href="https://wisdom.net.co/editorial-national-geographic/" role="button"> Ver más</a>
        </div>
    </div>
</div>
</div>


<?php } ?>

<?php include("template/pie.php"); ?>