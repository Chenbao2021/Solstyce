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
            if(isset($_get['login_err']))
            {
                $err=htmlspecialchars($_GET['login_err']);
                switch($err)
                {
                    case 'password';
                        ?>
                        <div class="alert alert_danger">
                            <strong>Erreur</strong> Mot de passe incorrect
                        </div>
                    <?php
                    break;

                    case 'email';
                        ?>
                        <div class="alert alert_danger">
                            <strong>Erreur</strong> email incorrect
                        </div>
                        <?php
                }
            }
        ?>
        <form action="connexion.php" method="post">
            <h2 class="text-center">Connexion</h2>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="email" required="required" >
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="mot de passe" required="required" >
            </div>    
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
            </div>
        </form>
        <p class="text-center"><a href="inscription.php">Inscription</a></p>
    </div>
    
</body>
</html>