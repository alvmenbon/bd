<?php include("api.php") ?>
<?php include("db.php") ?>
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
                <div class="form-group">
                    <label>Marca</label>
                    <select name="marca" id="marca" class="form-control">
                        <option value="-1" selected>Seleccione una marca</option>
                        <?php foreach ($carMakes as $k => $carMake) { ?>

                            <option value="<?php echo $carIds[$k]; ?>"><?php echo $carMake; ?></option>
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
                <input type="submit" class="btn btn-success btn-block" name="save-car" value="Añadir coche">
            </form>


        </div>
    </div>
</div>
<div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Año</th>

                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $result_car = $db->query("SELECT * FROM cars");

            while ($row = $result_car->fetchArray()) { ?>
                <tr>
                    <td><?php echo $row['make'] ?></td>
                    <td><?php echo $row['model'] ?></td>
                    <td><?php echo $row['year'] ?></td>
                    <td><?php echo $row['type'] ?></td>

                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                            <i class="fab fa-bitcoin"></i>
                        </a>
                        <a href="delete_car.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>


<?php include("script.php") ?>
<?php include("includes/footer.php") ?>