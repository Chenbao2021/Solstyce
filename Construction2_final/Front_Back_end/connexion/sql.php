<?php
    $user='root';
    $pass='root';
    try
    {
        $db=new PDO('mysql:host=localhost;dbname=comptes',$user,$pass);
        foreach ($db->query('select * from comptesperso') as $row){
            print_r($row['username'] . "<br/>");
            print_r($row['mdp']);
        }

        $db->query("insert into comptesperso (username,mdp) values('zaynab','123456')");
    } catch(PDOException $e)
    {
        print "Erreur : " . $e->getMessage() . "<br/>";
    }
?>

