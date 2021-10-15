<?php

include("db.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $db->query("DELETE FROM cars WHERE id = $id");
    if(!$result){
        die("query failed");
    }
    $_SESSION['message'] = 'Coche borrado';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
}

?>