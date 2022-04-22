<?php
    require_once 'config.php';
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
    {
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);
        $password_retype=htmlspecialchars($_POST['password_retype']);
        $check=$bdd->prepare('select email,password from comptesperso where email = ?');
        $check->execute(array($email));
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

                        $insert=$bdd->prepare("INSERT INTO comptesperso (email,password) VALUES(:email,:password)");
                        $insert->execute(array(
                            'email'=>$email,
                            'password'=>$password
                        ));
                        header('Location:connexion.php?reg_err=success'.$ip);
                    }else header('Location:inscription.php?reg_err=password');
            }else header('Location:inscription.php?reg_err=email_length');
        }else header('Location:inscription.php?reg_err=already');

    
    }