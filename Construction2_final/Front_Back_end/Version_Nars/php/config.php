<?php
    try{
        $bdd=new PDO('mysql:host=localhost;dbname=comptes','root','root');
        
    }catch(Exception $e){
        die('erreur');
    }
?>