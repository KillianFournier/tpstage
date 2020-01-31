<!DOCTYPE html>
<html align = "center">
    <head>
        <title>Accueil</title>
        <link rel="stylesheet" href="css.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
        <header><h1>Page D'Accueil</h1></header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div id="content">
            
            <a href='accueil.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:login.php");
                   }
                }
                else if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
            ?>
        <?php if($_SESSION == NULL){
            header('Location: login.php');
            exit; 
        }
        ?>

            
        </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="accueil.html">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="stage.php">Enregistrement des stages</a></li>
                        <li class="nav-item"><a class="nav-link" href="etudiant.php">Enregistrement des etudiants</a></li>
                        <li class="nav-item"><a class="nav-link" href="tuteur.php">Enregistrement des tuteurs</a></li>
                        <li class="nav-item"><a class="nav-link" href="entreprise.php">Enregistrement des entreprises</a></li>
                        <li class="nav-item"><a class="nav-link" href="total.php">Voir les donn&eacute;es enregistrer</a></li>
                        <!-- Ect .. -->
                    </ul>
                </div>
            <br>
        </nav>
        <footer class="copy">
            <hr>
                Copyright &copy; Akinil - 2020 - All Right Reserved
            <hr/>
        
        
        </footer>
    </body>
</html>