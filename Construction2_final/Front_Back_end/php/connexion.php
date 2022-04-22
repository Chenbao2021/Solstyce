<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST['userName']) && isset($_POST['password']))
    {
        $userName=htmlspecialchars($_POST['userName']);
        $password=htmlspecialchars($_POST['password']);

        $check=$bdd->prepare('select userName,password,email from comptesperso where userName = ?');
        $check->execute(array($userName));
        $data=$check->fetch();
        $row=$check->rowcount();

        if($row==1)
        {
                $password=hash('sha256',$password);
                if($data['password']==$password)
                {
                        $_SESSION['userName']=$data['userName'];
                        $_SESSION['email']=$data['email'];
                        header('Location:../pageAdmin.php');
                }else header('Location:../index.php?login_err=password'.$password);
        }else header('Location:../index.php?login_err=already');
    }else header('Location:../index.php');

    ?>