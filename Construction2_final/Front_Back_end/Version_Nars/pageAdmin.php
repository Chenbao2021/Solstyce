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
        <link rel="stylesheet" type="text/css" href="stylePage.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">  


        



        
    </head>
    <body>
        <?php include("php/sidebar.php"); ?>
<!-- ---------- DASHBOARD ----------- -->

<div class="main">
  




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

            <?php include('js/puissanceJour.php'); ?>



    </div>
   
    </div>
        
       

        <!-- FIN CANVAS CONTAINER  -->

    </div>
</div>



<!-- FIN AJOUT -->
</div>


        </div>
    </body>
</html>






