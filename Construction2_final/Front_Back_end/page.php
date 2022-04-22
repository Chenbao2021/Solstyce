<?php
    session_start();
    require_once 'php/config.php';
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
        <link rel="stylesheet" type="text/css" href="stylePage2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <!-- RESPONSIBLE TO ADD AND CUSTOMIZE THE CHARTS TO OUR APPLICATION  -->
        <script type="text/javascript" src="js/doha.js"></script>
        <style>
            #card-1{
                margin:0 auto;

            }
            #form button{
                width:20%;
            }
        </style>


      

    </head>
    <body>

       

<div class="main">

    <div class="wrap">
        <nav>
        <div class="logo2">
            <img src="images/logo2.png" alt="Logo"> 
            <span>Visualisation des données de la centrale photovoltaique  numéro :                            
                        <?php 
                                $check=$bdd->prepare('select IDModbus from modbus');
                                $check->execute();
                                $data=$check->fetch();
                                echo $data[0];
                        ?>
             </span>

        
        </div> 
        
        </nav>
    </div>      

    <div class="global">
           
     
           <div class="interieur1">
               <p>      
                   <?php 
                                $check=$bdd->prepare('select infos from infos where id=1');
                                $check->execute();
                                $data=$check->fetch();
                                echo $data[0];
                    ?>
                </p>
               <img src="images/cellule-photovoltaique.png" alt="" style="width: 50px; height: 50px;"/> 
               <?php
                   $sql="select valeur,id from ejour ORDER BY `id` DESC limit 1";        
                   $result = $bdd->query($sql);
                   $row = $result->fetch();
                   echo number_format($row[0], 2);
                   echo " Kw";
       
               ?>
           </div>
           <div class="interieur2">
               <p>
                    <?php 
                                        $check=$bdd->prepare('select infos from infos where id=2');
                                        $check->execute();
                                        $data=$check->fetch();
                                        echo $data[0];
                    ?>   
                </p>
               <img src="images/imeuble.png" alt="" style="width: 50px; height: 50px;"/></img>
               <?php
                   $sql="select valeur,id from co2 ORDER BY `id` DESC limit 1";        
                   $result = $bdd->query($sql);
                   $row = $result->fetch();
                   echo number_format($row[0], 2);
                   echo " Kg";
               ?>
       
           </div>
           <div class="interieur3">
               <p>
                    <?php 
                                $check=$bdd->prepare('select infos from infos where id=3');
                                $check->execute();
                                $data=$check->fetch();
                                echo $data[0];
                    ?>

               </p>
               <img src="images/verrouiller.png" alt="" style="width: 50px; height: 50px;"/> 
               <?php
                   $sql="select valeur,id from puissancecon ORDER BY `id` DESC limit 1";        
                   $result = $bdd->query($sql);
                   $row = $result->fetch();
                   echo number_format($row[0], 2);
                   echo " kW";
               ?>
           </div>
           <div class="interieur4">
               <p>
                    <?php 
                                $check=$bdd->prepare('select infos from infos where id=4');
                                $check->execute();
                                $data=$check->fetch();
                                echo $data[0];
                    ?>

               </p>
               <img src="images/energie-solaire.png" alt="" style="width: 50px; height: 50px;"/> 
               <?php
                   $sql="select valeur,id from irradiance ORDER BY `id` DESC limit 1";        
                   $result = $bdd->query($sql);
                   $row = $result->fetch();
                   echo number_format($row[0], 2);
                   echo "Gy";
               ?>
           </div>
       </div>
        
        
        <div class="dashboard">
            <div class="dashboard-cards">
    
                <!-- CANVAS CONTAINERS  -->
                
                <div class="card" id="card-1">
                    <div class="chart-canvas">
                        <?php 
                        if(!(isset($_POST['p']) || isset($_POST['co2']) || isset($_POST['pc']) || isset($_POST['rs']))){
                            include('js/puissanceJour.php'); 
                        }
                        if(isset($_POST['p'])){
                            include('js/puissanceJour.php'); 
                        }else if(isset($_POST['co2'])){
                            include('js/CO2.php'); 
                        }else if(isset($_POST['pc'])){
                            include('js/consomation.php'); 
                        }else if(isset($_POST['rs'])){
                            include('js/rs.php'); 
                        }
                        ?>
                        <form action="" method="post" id="form">
                            <button type="submit"  name="co2" class="but" >CO2</button>
                            <button type="submit"  name="p">Puissance</button>
                            <button type="submit"  name="pc">Puissance consommé</button>
                            <button type="submit"  name="rs">Radiation Solaire</button>
                        </form>
                    </div>
                </div>
                
               
    
                <!-- FIN CANVAS CONTAINER  -->
    
            </div>
        </div>






    </div>
        <a class="btn btn-primary" href="index.php" role="button"style="float:right">Q</a>



 <!-- using : [https://codepen.io/JFarrow/pen/nJgRga](https://codepen.io/JFarrow/pen/nJgRga). -->
    </body>
</html>


<!-- 
<div class="card"  id="card-4">
<div class="chart-canvas">
    <?php //include('js/puissanceJour.php'); ?>
</div>
</div>
-->




