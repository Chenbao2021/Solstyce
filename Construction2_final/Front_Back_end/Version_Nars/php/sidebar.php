<div class="wrapper">
            <div class="logo">
                <img src="images/logo2.png" alt="Logo">
            </div>
            <nav class="main-menu">
                <ul>
                    <li>
                        <a href="pageAdmin.php">
                            <i class="fa fa-home fa-2x"></i>
                            <span class="nav-text">Tableau de bord</span>
                        </a>
                    </li>
                    <!-- Que pour l admin -->
                    <li class="has-subnav">
                        <a href="pages/profile.php">
                            <i class="fa fa-user fa-2x"></i>
                            <span class="nav-text">Monsieur <?php echo $_SESSION['userName']; ?></span>
                        </a>  
                    </li>

                    <!--  -->  

                    <li class="has-subnav">
                        <a href="pages/historique.html">
                        <i class="fa fa-folder-open-o fa-2x"></i>
                            <span class="nav-text">Historique</span>
                        </a>   
                    </li>

                    <!-- Que pour l admin -->
                    <li>
                        <a href="pages/parametre.php">
                        <i class="fa fa-gear fa-2x"></i>
                            <span class="nav-text">Paramêtres </span>
                        </a>
                    </li>
                    
                </ul>
                    <ul class="logout">
                        <li>
                            <a href="./php/deconnexion.php">
                                <i class="fa fa-power-off fa-2x"></i>
                                <span class="nav-text">Déconnexion</span>
                            </a>
                        </li>  
                    </ul>
            </nav>



