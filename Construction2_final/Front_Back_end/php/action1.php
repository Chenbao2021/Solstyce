<?php
    require_once 'config.php';
    if(isset($_POST['ipModbus']) && isset($_POST['portModbus']) && isset($_POST['IDModbus']) && isset($_POST['tempsInterval']) )
    {
        $ipModbus=htmlspecialchars($_POST['ipModbus']);
        $portModbus=htmlspecialchars($_POST['portModbus']);
        $IDModbus=htmlspecialchars($_POST['IDModbus']);
        $tempsInterval=htmlspecialchars($_POST['tempsInterval']);
        $sql1="drop table modbus";
        $sql="CREATE  TABLE modbus
        (
            ipModbus VARCHAR(100),
            portModbus INT,
            IDModbus INT,
            tempsInterval INT
        )";
        $bdd->query($sql1);
        $bdd->query($sql);
        $insert=$bdd->prepare("INSERT INTO modbus(ipModbus,portModbus,IDModbus,tempsInterval) VALUES(:ipModbus,:portModbus,:IDModbus,:tempsInterval)");
        $insert->execute(array(
                            'ipModbus'=>$ipModbus,
                            'portModbus'=>$portModbus,
                            'IDModbus'=>$IDModbus,
                            'tempsInterval'=>$tempsInterval
        ));
        header('Location:../pageAdmin.php');
    }
?>