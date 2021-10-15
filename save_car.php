<?php 

include("db.php");

if (isset($_POST['save-car'])){
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $type = $_POST['type'];
  

    
    $result = $db->query("INSERT INTO cars(make, model, year, type) VALUES('$make', '$model', '$year', '$type')");
    
    
    if (!$result) {
        die("query error");  /*COMPROBACION DE LA CONSULTA*/
    }

    $_SESSION['message']= 'Coche añadido correctamente';
    $_SESSION['message_type']='success';


    header("Location:  index.php"); /*REDIRECCIONA */
}

?>
