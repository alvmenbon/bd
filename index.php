<?php include("api.php") ?>
<?php include("includes/header.php") ?>


   

<div class="container p-4">
    <div class="col-md-4">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?php $_SESSION['message']; ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_unset();
        } ?>
        <div class="card card-body">
            <form action="save_car.php" method="POST">
                <label>Marca</label>
                <select name="marca" id="marca" class="form-control">
                    <option value="-1" selected>Seleccione una marca</option>
                    <?php foreach ($carMakes as $k => $carMake){?>
                        
                        <option value="<?php echo $carIds[$k];?>"><?php echo $carMake;?></option>
                    <?php
                     
                     }
                    ?>
                </select>
                <label>Modelo</label>
                <select name="modelo" id="modelo" class="form-control">
                <option value="-1" selected>Seleccione un modelo</option>
                </select>
                <label>Tipo</label>
                <select name="type" id="type" class="form-control">
                <option value="-1" selected>Seleccione un tipo</option>
                </select>
                <label>Año</label>
                <select name="year" id="year" class="form-control">
                <option value="-1" selected>Seleccione un año</option>
                </select>
            </form>


        </div>
    </div>
</div>


<?php include("script.php")?>
<?php include("includes/footer.php")?>

