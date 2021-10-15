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


<script type="application/javascript">
    const models = Array();
    <?php
    foreach($carIds as $carId) {
        $models = array_values(array_filter($resultados, function($row) use ($carId) {
            return $row['id'] === $carId;
        } ));
        ?>
    models[<?php echo $carId;?>] = [ <?php
        for ($i = 0; $i < count($models) - 1; $i++ ) {
            ?>{ id: <?php echo $models[$i]['id']; ?>, name: "<?php echo $models[$i]['model']; ?>" }, <?php
        }
        ?>{ id: <?php echo $models[$i]['id']; ?>, name: "<?php echo $models[$i]['model']; ?>" } ];
    <?php
    }
    ?>
    
    const types = Array();
    <?php
    foreach($carIds as $carId) {
        $types = array_values(array_filter($resultados, function($row) use ($carId) {
            return $row['id'] === $carId;
        } ));
        ?>
    types[<?php echo $carId;?>] = [ <?php
        for ($i = 0; $i < count($types) - 1; $i++ ) {
            ?>{ id: <?php echo $types[$i]['id']; ?>, name: "<?php echo $types[$i]['model']; ?>" }, <?php
        }
        ?>{ id: <?php echo $types[$i]['id']; ?>, name: "<?php echo $types[$i]['model']; ?>" } ];
    <?php
    }
    ?>

    document.getElementById('marca').addEventListener('change', function(e) {
        let ownModels = models[e.target.value];

        let modelDropdown = document.getElementById('modelo');
        modelDropdown.innerText = null;

        ownModels.forEach( function(c) {
            var option = document.createElement('option');
            option.text = c.name;
            option.value = c.id;
            modelDropdown.appendChild(option);
        } )
    });
    document.getElementById('modelo').addEventListener('change', function(e) {
        let ownTypes = types[e.target.value];

        let typeDropdown = document.getElementById('type');
        typeDropdown.innerText = null;

        ownTypes.forEach( function(c) {
            var option = document.createElement('option');
            option.text = c.name;
            option.value = c.id;
            typeDropdown.appendChild(option);
        } )
    });
    
</script>