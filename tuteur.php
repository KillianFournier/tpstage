<!DOCTYPE html>
<html align = "center">
<title>Enregistrement des tuteurs</title>
<link rel="stylesheet" href="css.css"/>
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <header><h1>Enregistrement des Tuteurs</h1></header>
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
                <li class="nav-item"><a class="nav-link" href="accueil.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="stage.php">Enregistrement des stages</a></li>
                <li class="nav-item"><a class="nav-link" href="etudiant.php">Enregistrement des etudiants</a></li>
                <li class="nav-item active"><a class="nav-link" href="tuteur.php">Enregistrement des tuteurs</a></li>
                <li class="nav-item"><a class="nav-link" href="entreprise.php">Enregistrement des entreprises</a></li>
                <li class="nav-item"><a class="nav-link" href="total.php">Voir les donn&eacute;es enregistrer</a></li>
                <!-- Ect .. -->
            </ul>
        </div>
    <br>
    </nav>
    <body>
    </body>
    <form class="form" action="" method="POST">
    <p> 
    <div class="textform"> Veuillez mettre l'id du tuteur :</div>
        <input  type="number" class="form-control" min="1" name ="Idtuteur" placeholder="Id du tuteur" requiered >
        <br>
        <div class="textform"> Veuillez mettre le nom du tuteur :</div>
        <input type="text" name ="Nomtuteur" class="form-control" placeholder="Nom du tuteur" requiered >
        <br>
        <div class="textform"> Veuillez mettre le prenom du tuteur :</div>
        <input type="text" name ="Prenomtuteur" class="form-control" placeholder="Prenom du tuteur" requiered >
        <br>
        <div class="textform"> Veuillez mettre le mail du tuteur :</div>
        <input type="mail" name ="Mailtuteur" class="form-control" placeholder="Mail du tuteur" requiered >
        <br>
        <button class="btn btn-primary" type="submit" name = "submit">Valider</button>
        </p>
    </form>
    <?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=tpstage;charset=utf8','killian','killian');
    }
    catch(exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    if(isset($_POST['submit'])){
        $id=($_POST['Idtuteur']);
        $nom=($_POST['Nomtuteur']);
        $prenom=($_POST['Prenomtuteur']);
        $mailtut=($_POST['Mailtuteur']);
        $req = $bdd->prepare('INSERT INTO Tuteur VALUES (?,?,?,?)');
        $success = $req->execute(array($id,$nom,$prenom,$mailtut));
        if($success) {?>
           <p><div class="alert alert-success" role="alert">Tuteur enregistré </div></p>
        <?php } else {?>
           <p><div class="alert alert-danger" role="alert">Erreur d'enregistrement</div></p>
       <?php }
    }
    ?>

<footer class="copy">
  <hr>
      Copyright &copy; Akinil - 2020 - All Right Reserved
  <hr/>


</footer>
</html>