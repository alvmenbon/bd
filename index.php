<?php include("api.php") ?>
<?php include("includes/header.php") ?>

<script>
function getModels(){
    var result = <?php $resultado ?>
    document.write(result)
}

</script>

    <div class="container p-4">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])) { ?>                                      
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="save_car.php" method="POST">
                <label>AÑO</label>
            <select id="slt-year" class="form-control">
                <option value="" selected>Seleccione un año</option>
                <?php foreach($resultado as $resultado): ?>
                    <option value="<?php echo $resultado['year']; ?>"><?php echo $resultado['year'];
                    echo "<tr>";
                    echo "<td>" . $resultado['id'] . "</td>";
                    echo "<td>" . $resultado['year'] . "</td>";
                    echo "<td>" . $resultado['make'] . "</td>";
                    echo "<td>" . $resultado['model'] . "</td>";
                    echo "<td>" . $resultado['type'] . "</td>";
               
                    echo "</tr>"; ?></option>
                <?php endforeach; ?>
                <?php foreach($resultado as $resultado): ?>
                    <option value="<?php echo $resultado['year']; ?>"><?php echo $resultado['year'];
                    echo "<tr>";
                    echo "<td>" . $resultado['id'] . "</td>";
                    echo "<td>" . $resultado['year'] . "</td>";
                    echo "<td>" . $resultado['make'] . "</td>";
                    echo "<td>" . $resultado['model'] . "</td>";
                    echo "<td>" . $resultado['type'] . "</td>";
               
                    echo "</tr>"; ?></option>
                <?php endforeach; ?>
            </select>
            <label>MARCA </label>
            <select id="slt-marca" class="form-control" onchange = "getModels()">
			    <option value="" selected>Seleccione una Marca</option>
                <?php foreach($resultado as $resultado): ?>
                    <option value="<?php echo $resultado['make']; ?>"><?php var_dump($resultado['make']); ?></option>
                <?php endforeach; ?>
			</select>
        </div>        
    </div>
   

    <table >
    <thead>
        <tr>
            <th>Codigo Cliente</th>
            <th>NombreCliente</th>
            <th>DirecciÃ³n 1</th>
            <th>Telefono</th>
            <th>Ciudad</th>
            <th>Pais</th>
            <th>Codigo Postal</th>
        </tr>
    </thead>
    <?php
    foreach ($resultado as $r):
        echo "<tr>";
        echo "<td>" . $r['id'] . "</td>";
        echo "<td>" . $r['year'] . "</td>";
        echo "<td>" . $r['make'] . "</td>";
        echo "<td>" . $r['model'] . "</td>";
        echo "<td>" . $r['type'] . "</td>";
   
        echo "</tr>";
    endforeach;
    ?>
</table>