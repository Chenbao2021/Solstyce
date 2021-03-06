<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Solstyce</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login">
        <h1>Se connecter</h1>
        <form action="./php/connexion.php" method="post">
            <input type="text" name="userName" placeholder="Nom d'utilisateur" required="required" />
            <div class="input-box">
                <input type="password" name="password" placeholder="Mot de passe" required="required" id="password" /> 
                <div id="toggle" onclick="showHide(); "></div>
                <script type="text/javascript">
                    const password = document.getElementById('password');
                    const toggle = document.getElementById('toggle');

                    function showHide(){
                        if (password.type === 'password'){
                            password.setAttribute('type','text');
                            toggle.classList.add('hide')
                        }else{
                            password.setAttribute('type','password');
                            toggle.classList.remove('hide')
                        }
                    }

                </script>
            </div>
           

            <button type="submit" class="btn btn-primary btn-block btn-large">Se connecter</button>
            <div class="mt-5 text-center">
                <a  class="guest" href="page.php" target="_blank">Mode présentation</a>
            </div>
            <div class="mt-4 text-center">
                Vous n'avez pas un compte ? <br>
                <a  class="inscription" href="signup.html">Inscrivez-vous</a>
            </div>
        </form>
    </div>

</body>
</html>




	