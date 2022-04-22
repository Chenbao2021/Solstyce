<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>connexion</title>
</head>
<body>
    <div class="login-form">
    <?php
            if(isset($_get['reg_err']))
            {
                $err=htmlspecialchars($_GET['login_err']);
                switch($err)
                {
                    case 'success';
                        ?>
                        <div class="alert alert_danger">
                            <strong>Success</strong> Inscription réussis
                        </div>
                    <?php
                    break;

                    case 'email';
                        ?>
                        <div class="alert alert_danger">
                            <strong>Erreur</strong> email incorrect
                        </div>
                        <?php
                    case 'password';
                    ?>
                    <div class="alert alert_danger">
                        <strong>Erreur</strong> password incorrect
                    </div>
                <?php
                }
            }
    ?>
        <form action="inscription_traitement.php" method="post">
            <h2 class="text-center">Inscription</h2>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="email" required="required" >
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="mot de passe" required="required" >
            </div>    
            <div class="form-group">
                <input type="password" name="password_retype" class="form-control" placeholder="Retype mot de passe" required="required" >
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Inscription</button>
            </div>
        </form>
    </div>
    
</body>
</html>