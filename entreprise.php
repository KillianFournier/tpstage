<!DOCTYPE html>
<html align = "center">
<title>Enregistrement des entreprises</title>
<link rel="stylesheet" href="css.css"/>
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">
    <header><h1>Enregistrement des Entreprises</h1></header>
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
                <li class="nav-item"><a class="nav-link" href="tuteur.php">Enregistrement des tuteurs</a></li>
                <li class="nav-item active"><a class="nav-link" href="entreprise.php">Enregistrement des entreprises</a></li>
                <li ><a class="nav-link" href="total.php">Voir les donn&eacute;es enregistrer</a></li>
                <!-- Ect .. -->
            </ul>
        </div>
    <br>
    </nav>
    <body>
    <form class="form" action="" method="POST">
        <p> 
        <div class="textform"> Veuillez mettre l'id de l'entreprise :</div>
        <input type="number" class="form-control" min="1" name ="Ident" placeholder="Id de l'entreprise" requiered >
        <br>
        <div class="textform"> Veuillez mettre le nom de l'entreprise :</div>
        <input type="text" class="form-control" name ="Denomination" placeholder="Nom de l'entreprise" requiered >
        <br>
       <button  class="btn btn-primary" class="form-control" type="submit" name = "submit">Valider</button>
        <p>
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
        $id=($_POST['Ident']);
        $nom=($_POST['Denomination']);
        $req = $bdd->prepare('INSERT INTO Entreprise VALUES (?,?)');
        $success = $req->execute(array($id,$nom));
        if($success) {
            echo"<p style='color: green'>Entreprise enregistré";
        } else {
            echo"<p style='color: red'>Erreur d'enregistrement</p>";
        }


    }

    ?>

<footer class="copy">
  <hr>
      Copyright &copy; Akinil - 2020 - All Right Reserved
  <hr/>


</footer>
</body>
</html>
