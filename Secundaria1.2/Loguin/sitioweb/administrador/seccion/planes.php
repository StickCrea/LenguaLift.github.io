<?php include("../template/cabecera.php"); ?>
<?php
 
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/bd.php");

switch($accion){
        case "Agregar":
            $sentenciaSQL= $conexion->prepare("INSERT INTO planes (nombre,imagen) VALUES (:nombre,:imagen);");
            $sentenciaSQL->bindParam(':nombre',$txtNombre);

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            if($tmpImagen!=""){

                move_uploaded_file($tmpImagen, "../../img/".$nombreArchivo);
            }

            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->execute();    

            header("Location:planes.php");

            break;

        case "Modificar":

            
            $sentenciaSQL= $conexion->prepare("UPDATE planes SET nombre=:nombre WHERE id=:id");
            $sentenciaSQL->bindParam(':nombre',$txtNombre);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

            if($txtImagen!=""){

                $fecha= new DateTime();
                $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

                move_uploaded_file($tmpImagen, "../../img/".$nombreArchivo);

                $sentenciaSQL= $conexion->prepare("SELECT imagen FROM planes WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $plan=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if(isset($plan["imagen"]) &&($plan["imagen"]!="imagen.jpg") ){

                    if(file_exists("../../img/".$plan["imagen"])){

                        unlink("../../img/".$plan["imagen"]);

                    }
                }

                $sentenciaSQL= $conexion->prepare("UPDATE planes SET imagen=:imagen WHERE id=:id");
                $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
            }   
            
            header("Location:planes.php");

            break;    

        case "Cancelar":

            header("Location:planes.php");
           
            break;

        case "Seleccionar":

            $sentenciaSQL= $conexion->prepare("SELECT * FROM planes WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $plan=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $txtNombre=$plan['nombre'];
            $txtImagen=$plan['imagen'];

            //echo "Presionado botón Seleccionar";
            break;

        case "Borrar":

            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM planes WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $plan=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($plan["imagen"]) &&($plan["imagen"]!="imagen.jpg") ){

                if(file_exists("../../img/".$plan["imagen"])){

                    unlink("../../img/".$plan["imagen"]);

                }
            }

          $sentenciaSQL= $conexion->prepare("DELETE FROM planes WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

            header("Location:planes.php");

            break;
}

$sentenciaSQL= $conexion->prepare("SELECT * FROM planes");
$sentenciaSQL->execute();
$listaPlanes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Planes de Inglés
        </div>

        <div class="card-body">
            
            <form method="POST" enctype="multipart/form-data">

                <div class = "form-group">
                <label for="txtID">ID:</label>
                <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class="form-group">
                <label for="txtNombre">Nombre:</label>
                <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del plan">
                </div>

                <div class="form-group">
                <label for="txtNombre">Imagen:</label>

                <br/>

                <?php
                    if($txtImagen!=""){ ?>

                        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen;?>"width="50" alt="" srcset="">

                
                <?php } ?>


                <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre del plan">
                </div>

                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                    </div>

            </form>

        </div>

    </div>


</div>
<div class="col-md-7">
    

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaPlanes as $plan) { ?>
            <tr>
                <td><?php echo $plan['id']; ?></td>
                <td><?php echo $plan['nombre']; ?></td>
                <td>

                <img class="img-thumbnail rounded" src="../../img/<?php echo $plan['imagen']; ?>" width="50" alt="" srcset="">
                
                
            </td>

                <td>
                    <form method="post">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $plan['id']; ?>">

                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />

                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />


                    </form>

                
                </td>

            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>




<?php include("../template/pie.php");?>