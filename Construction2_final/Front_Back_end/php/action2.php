<?php
    require_once 'config.php';
    if(isset($_POST['nbregistres']) && isset($_POST['adresses']) && isset($_POST['gain']) && isset($_POST['cd']) && $_POST['data'])
    {
        $data=htmlspecialchars($_POST['data']);
        $adresses=htmlspecialchars($_POST['adresses']);
        $gain=htmlspecialchars($_POST['gain']);
        $cd=htmlspecialchars($_POST['cd']);
        $nbregistres=htmlspecialchars($_POST['nbregistres']);

        $sql=$bdd->prepare("CREATE  TABLE if not exists modbusSupplementaire
        (
            dat varchar(100),
            adresses INT,
            nbregistres INT,
            gain INT,
            cd VARCHAR(100)
        )");
        $sql->execute();

        $data=$_POST['data'];
        $delete =$bdd->prepare( "delete from modbusSupplementaire where dat=:dat");
        $delete->execute(array(
            'dat'=>$data
        ));

        $insert=$bdd->prepare("INSERT INTO modbusSupplementaire(dat,adresses,gain,cd,nbregistres) VALUES(:dat,:adresses,:gain,:cd,:nbregistres)");
        $insert->execute(array(
                            'dat'=>$data,
                            'adresses'=>$adresses,
                            'gain'=>$gain,
                            'cd'=>$cd,
                            'nbregistres'=>$nbregistres
        ));
        header('Location:../pageAdmin.php');
    }
?>