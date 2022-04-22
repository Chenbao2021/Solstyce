<?php
    require_once '../config.php';
    $check=$bdd->prepare('DELETE FROM infos WHERE id=:id');
    $check->execute(array(
        'id'=>$_POST['zone']
    ));
    $check=$bdd->prepare('INSERT INTO infos (infos, id) VALUES (:infos,:id)');
    $check->execute(array(
        'infos'=>htmlspecialchars($_POST['info']),
        'id'=>$_POST['zone']
    ));


    header("Location:../../pageAdmin.php");
?>