
<script type="application/javascript">
    const models = Array();
    <?php
    foreach ($carIds as $carId) {
        $models = array_values(array_filter($resultados, function ($row) use ($carId) {
            return $row['id'] === $carId;
        }));
    ?>
        models[<?php echo $carId; ?>] = [<?php
                                        for ($i = 0; $i < count($models) - 1; $i++) {
                                        ?> {
                id: <?php echo $models[$i]['id']; ?>,
                name: "<?php echo $models[$i]['model']; ?>"
            }, <?php
                                        }
                ?> {
                id: <?php echo $models[$i]['id']; ?>,
                name: "<?php echo $models[$i]['model']; ?>"
        }];
    <?php
    }
    ?>

    const types = Array();
    <?php
    foreach ($carIds as $carId) {
        $types = array_values(array_filter($resultados, function ($row) use ($carId) {
            return $row['id'] === $carId;
        }));
    ?>
        types[<?php echo $carId; ?>] = [<?php
                                        for ($i = 0; $i < count($types) - 1; $i++) {
                                        ?> {
                id: <?php echo $types[$i]['id']; ?>,
                name: "<?php echo $types[$i]['type']; ?>"
            }, <?php
                                        }
                ?> {
                id: <?php echo $types[$i]['id']; ?>,
                name: "<?php echo $types[$i]['type']; ?>"
        }];
    <?php
    }
    ?>

    const years = Array();
    <?php
    foreach ($carIds as $carId) {
        $years = array_values(array_filter($resultados, function ($row) use ($carId) {
            return $row['id'] === $carId;
        }));
    ?>
        years[<?php echo $carId; ?>] = [<?php
                                        for ($i = 0; $i < count($years) - 1; $i++) {
                                        ?> {
                id: <?php echo $years[$i]['id']; ?>,
                name: "<?php echo $years[$i]['year']; ?>"
            }, <?php
                                        }
                ?> {
                id: <?php echo $years[$i]['id']; ?>,
                name: "<?php echo $years[$i]['year']; ?>"
        }];
    <?php
    }
    ?>


    document.getElementById('marca').addEventListener('change', function(e) {
        let ownModels = models[e.target.value];

        let modelDropdown = document.getElementById('modelo');
        modelDropdown.innerText = null;

        ownModels.forEach(function(c) {
            var option = document.createElement('option');
            option.text = c.name;
            option.value = c.id;
            modelDropdown.appendChild(option);
        })
    });
    document.getElementById('marca').addEventListener('change', function(e) {
        let ownTypes = types[e.target.value];

        let typeDropdown = document.getElementById('type');
        typeDropdown.innerText = null;

        ownTypes.forEach(function(c) {
            var option = document.createElement('option');
            option.text = c.name;
            option.value = c.id;
            typeDropdown.appendChild(option);
        })
    });

    document.getElementById('marca').addEventListener('change', function(e) {
        let ownYears = years[e.target.value];

        let yearDropdown = document.getElementById('year');
        yearDropdown.innerText = null;

        ownYears.forEach(function(c) {
            var option = document.createElement('option');
            option.text = c.name;
            option.value = c.id;
            yearDropdown.appendChild(option);
        })
    });
</script>