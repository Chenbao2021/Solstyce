<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connect.css" />
    <title>Document</title>
</head>
<body>
    <section id="Bandeau">
        <div id="choisirCentrale">
            <em><p style="font-size:50px;">Bienvenue chez Solstyce</p></em>
            <br>
        </div>
        <div id="logoDroite"></div>
    </section>
    <section id="connect">
        <p id="login">  
            <h1>Login</h1>  
            <form method="post" action="login.php">  
            <input type="text" required="required" placeholder="用户名" name="username"></input> <br/>
            <input type="password" required="required" placeholder="密码" name="password"></input>  
            <button class="but" type="submit" name="login">Connect</button>        
            </form>  
            <a href="index.html"><button class="but">Guest</button> </a>
        </p>  
    </section>
</body>
</html>