<?php

include("db.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $db->query("SELECT * FROM cars WHERE id = $id");
    if($result!= NULL) {
       /* echo 'you can edit'; */
       $row = $result->fetchArray();
       $make = $row['make'];
       $model = $row['model'];                  /*ESTO COGE LOS DATOS DE TU TABLA*/
       $year = $row['year'];
       $type = $row['type'];
      
       
    }
}

if (isset($_POST['update'])){
   /* echo 'updating';*/
   $id = $_GET['id'];                   /*UTILIZAMOS GET PARA CONTROLAR QUE ID ESTAMOS EDITANDO*/
   $make = $_POST['make'];            /**POST HACE LO MISMO, PERO NO DEJA VER QUE DATOS SE INTRODUCEN */
   $model = $_POST['model'];
   $year = $_POST['year'];
   $type = $_POST['type'];
  
   
  /* echo $brand;
   echo $model;
   echo $year;
   echo $matricula;
   echo $precio;*/
   /*$query = "UPDATE cars set brand = '$brand', model = '$model', year = '$year', matricula= '$matricula', precio = '$precio' WHERE id = $id";
   mysqli_query($conn, $query);*/
   $db->query("UPDATE cars set make = '$make', model = '$model', year = '$year', type= '$type' WHERE id = $id");

    $_SESSION['message']= 'Datos editados correctamente';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}
?>

<?php include("includes/header.php") ?>
<?php include("api.php") ?>

<div class="container p-4">
   <div class="row">
       <div class="col-md-4 mx-auto">
           <div class="card card-body">
           <form action="save_car.php" method="POST">
                <div class="form-group">
                <label>Marca</label>
                <select name="marca" id="marca" class="form-control">
                    <option value="-1" selected>Seleccione una marca</option>
                    <?php foreach ($carMakes as $k => $carMake){?>
                        
                        <option value="<?php echo $carIds[$k];?>"><?php echo $carMake;?></option>
                    <?php
                     
                     }
                    ?>

                </select>
                </div>
                <div class="form-group">
                <label>Modelo</label>
                <select name="modelo" id="modelo" class="form-control">
                <option value="-1" selected>Seleccione un modelo</option>
                </select>
                </div>
                <div class="form-group">
                <label>Tipo</label>
                <select name="type" id="type" class="form-control">
                <option value="-1" selected>Seleccione un tipo</option>
                </select>
                </div>
                <div class="form-group">
                <label>Año</label>
                <select name="year" id="year" class="form-control">
                <option value="-1" selected>Seleccione un año</option>
                </select>
                </div>
    
                <button class="btn btn-succes" name="update">Editar</button>
            </form>
           </div>
       </div>
   </div> 
</div>

<?php include("script.php") ?>
<?php include("includes/footer.php") ?> 