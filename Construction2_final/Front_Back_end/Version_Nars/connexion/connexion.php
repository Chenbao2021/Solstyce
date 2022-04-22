<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);

        $check=$bdd->prepare('select email,password from comptesperso where email = ?');
        $check->execute(array($email));
        $data=$check->fetch();
        $row=$check->rowcount();

        if($row==1)
        {
                $password=hash('sha256',$password);
                if($data['password']==$password)
                {
                        $_SESSION['user']=$data['email'];
                        header('Location:landing.php');
                }else header('Location:index.php?login_err=password'.$password);
        }else header('Location:index.php?login_err=already');
    }else header('Location:index.php');

    ?>