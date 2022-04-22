<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Solstyce</title>

        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/chart.min.js"></script>

        <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>

        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../stylePage.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">  


        



        
    </head>
    <body>
        <div class="wrapper">
            <div class="logo">
                <img src="../images/logo2.png" alt="Logo">
            </div>
            <nav class="main-menu">
                <ul>
                    <li>
                        <a href="../pageAdmin.php">
                            <i class="fa fa-home fa-2x"></i>
                            <span class="nav-text">Tableau de bord</span>
                        </a>
                    </li>
                    <!-- Que pour l admin -->
                    <li class="has-subnav">
                        <a href="profile.php">
                            <i class="fa fa-user fa-2x"></i>
                            <span class="nav-text"> Monsieur <?php echo $_SESSION['userName']; ?></span></span>
                        </a>  
                    </li>

                    <!--  -->  

                    <li class="has-subnav">
                        <a href="historique.html">
                        <i class="fa fa-folder-open-o fa-2x"></i>
                            <span class="nav-text">Historique</span>
                        </a>   
                    </li>

                    <!-- Que pour l admin -->
                    <li>
                        <a href="parametre.php">
                        <i class="fa fa-gear fa-2x"></i>
                            <span class="nav-text">Paramêtres </span>
                        </a>
                    </li>
                </ul>
                    <ul class="logout">
                        <li>
                            <a href="../index.php">
                                <i class="fa fa-power-off fa-2x"></i>
                                <span class="nav-text">Déconnexion</span>
                            </a>
                        </li>  
                    </ul>
            </nav>



<!-- ---------- DASHBOARD ----------- -->

<div class="main">
    <div class="editImg">
        <h2>Modifier le logo </h2>
        <form action="../php/uploadheadimg.php" method="post" enctype="multipart/form-data" id="img">
            <input type="file" name='myfile'/>
            <br>
            <input type="submit" value="confirmer" />
        </form>
    </div>
    <br>
    <div class="editTxt">
        <h2>Modifier une zone de texte  </h2>
        <form action="../php/changeTxt/changeTxt.php" method="post" id="text">
                <select name=zone>
                    <option value=1>zone1</option>
                    <option value=2>zone2</option>
                    <option value=3>zone3</option>
                    <option value=4>zone4</option>
                </select>
                <input type="textarea" name='info' style="width:350px"/>
                <br>
                <input type="submit" value="confirmer" />
        </form>
    </div>
        <div class="editModbus" >
                <h2>Informations du Modbus  </h2>
                <form action="/php/action1.php" method="post" class="STYLE-NAME">
                                <label>
                                <span>Adresse IP du modbus :</span>
                                <input id="name" type="text" name="ipModbus" placeholder="L'adresse IP de modbus" value="192.168.69.29"/>
                                </label>
                                <br/>
                                <label>
                                <span>Le port de modbus :</span>
                                <input id="email" type="number" name="portModbus" placeholder="Le port de modbus" value="502"/>
                                </label>
                                <br/>

                                <label>
                                <span>L'ID ip du modbus</span>
                                <input id="message" type="number" name="IDModbus" placeholder="Id IP du modbus" value="1"></textarea>
                                </label>
                                <br/>
                                <label>
                                <span>Le temps entre deux lectures en secodnes :</span>
                                <input id="email" type="number" name="tempsInterval" placeholder="Le temps entre deux lectures en secondes " value="60"/>
                            
                                </label>
                                <br/>
                                <label>
                                <span>&nbsp;</span>
                                <input type="submit"  value="confirmer"/>
                                </label>
                                <br/>
                            </form>
            </div>
            <div class="editModbus">
                <h2></h2>
                <form action="../php/action2.php" method="post" class="STYLE-NAME" >
                                <label>
                                Decodage:
                                <select name="cd">
                                        <option value="8bit">8 bit</option>
                                        <option value="u8bit">unsigned 8 bit</option>
                                        <option value="16bit">16 bit</option>
                                        <option value="u16bit">unsigned 16 bit</option>
                                        <option value="32bit">32 bit</option>
                                        <option value="u32bit">unsigned 32 bit</option>
                                        <option value="64bit">64 bit</option>
                                        <option value="u64bit">unsigned 64 bit</option>
                                    </select>
                                </label>
                                <br/>
                                <label>
                                    Type data:
                                    <select name="data" type="text">
                                        <option value="co2">co2</option>
                                        <option value="ejour">Énergie journalière</option>
                                        <option value="puissance">Puissance </option>
                                        <option value="puissanceconsommé">Puissance consommé</option>
                                    </select>
                                </label>
                                </br>
                                
                                <label>
                                    <span>Adresses :</span>
                                    <input id="name" type="int" name="adresses"/>
                                </label>
                                </br>
                                <label>
                                    <span>Gain :</span>
                                    <input id="email" type="int" name="gain" />
                                </label>
                                <br/>
                                <label>
                                    <span>Nombre de registres</span>
                                    <input id="nbregistres" type="int" name="nbregistres" />
                                </label>
                                <br/>
                        <input type="submit" value="confirmer" />
                </form>
            </div>
        </div>
</div>
    </body>
</html>

<style>

.editImg,.editTxt{
    position:center;
    color:black;
    background-color:white;
}

.editModbus{
    border:5px;
    color:black;
    background-color:white;
    margin-top:10px;
}

.main{
    width:40%;
}

.main div{
    background-Color:black;
    opacity:0.8;
    font:white;
    color:white;
    border-radius:10px;
    padding:10px;
}
</style>




