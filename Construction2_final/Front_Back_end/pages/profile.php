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
        <link rel="stylesheet" type="text/css" href="../styleprofile.css">

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
                            <span class="nav-text">Monsieur <?php echo $_SESSION['userName']; ?></span>
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
                    <!--  -->
                  
                </ul>
                    <ul class="logout">
                        <li>
                            <a href="../php/deconnexion.php">
                                <i class="fa fa-power-off fa-2x"></i>
                                <span class="nav-text">Déconnexion</span>
                            </a>
                        </li>  
                    </ul>
            </nav>



<!-- ---------- DASHBOARD ----------- -->

<div class="main">




  <div class="main-content">
      <!-- Header -->
    <div class="align-items-center" style="min-height: 100px;">
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connecté</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3 class="nom">
                  Bonjour <?php echo $_SESSION['userName']; ?>
                </h3>

              </div>
            </div>
          </div>
        </div>
          
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Mon compte </h3>
                </div>

              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">informations de l'utilisateur</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-last-name">Nom d'utilisateur</label>
                          <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $_SESSION['userName']; ?>">
                        </div>
                      </div>
                      

                  </div>
                  <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-email">Email </label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $_SESSION['email']; ?>">
                        </div>
                      </div>

                  </div>
                </div>
                <hr class="my-4">
                <hr class="my-4">
                <hr class="my-4">
                <hr class="my-4">
                <hr class="my-4">
                <hr class="my-4">


              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>


        </div>


        <footer class="footer">
          <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6 m-auto text-center">
              <!-- copyright
                using : https://www.creative-tim.com/product/argon-dashboard"
              -->
            </div>
          </div>
        </footer>
    </body>
</html>
