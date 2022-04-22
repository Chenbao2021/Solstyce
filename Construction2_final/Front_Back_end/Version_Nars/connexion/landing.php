<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonjour !</title>
</head>
<body>
    <h1>Bonjour! <?php echo $_SESSION['user']; ?></h1>
    <a href="deconnexion.php" class="btn btn-danger brn-lg">Deconnexion</a>
</body>
</html>