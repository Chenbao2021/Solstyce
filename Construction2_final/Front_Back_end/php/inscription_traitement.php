<?php
    require_once 'config.php';
    if(isset($_POST['email']) && isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['password_retype']))
    {
        $userName=htmlspecialchars($_POST['userName']);
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);
        $password_retype=htmlspecialchars($_POST['password_retype']);
        $check=$bdd->prepare('select userName,password from comptesperso where userName = ?');
        $check->execute(array($userName));
        $data=$check->fetch();
        $row=$check->rowcount();
        //$bdd->query("insert into comptesperso (email,password,ip) values('zaynab@a.fr','123456','123')");
        if($row==0)
        {
            if(strlen($email)<=100)
            {
                    if($password==$password_retype)
                    {
                        $password=hash('sha256',$password);

                        $insert=$bdd->prepare("INSERT INTO comptesperso (userName,email,password) VALUES(:userName,:email,:password)");
                        $insert->execute(array(
                            'userName'=>$userName,
                            'email'=>$email,
                            'password'=>$password
                        ));
                        header('Location:../index.php?reg_err=success'.$ip);
                    }else header('Location:../signup.html?reg_err=password');
            }else header('Location:../signup.html?reg_err=email_length');
        }else header('Location:../signup.html?reg_err=already');
    }