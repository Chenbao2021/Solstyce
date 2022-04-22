<?php
    try{
        $bdd=new PDO('mysql:host=localhost;dbname=comptes','root','');

    }catch(Exception $e){
        die('HAMIIIIIIIIIID');
    }
?>