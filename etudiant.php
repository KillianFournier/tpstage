<!DOCTYPE html>
<html align = "center">
<title>Enregistrement des etudiants</title>
<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css.css"/>
    <header><h1>Enregistrement des Etudiants</h1></header>
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
                <li class="nav-item active"><a class="nav-link" href="etudiant.php">Enregistrement des etudiants</a></li>
                <li class="nav-item"><a class="nav-link" href="tuteur.php">Enregistrement des tuteurs</a></li>
                <li class="nav-item"><a class="nav-link" href="entreprise.php">Enregistrement des entreprises</a></li>
                <li class="nav-item"><a class="nav-link" href="total.php">Voir les donn&eacute;es enregistrer</a></li>
            </ul>
        </div>
    <br>
</nav>
    <body>

   
    <form class="form" action="" method="POST">
    <p> 
     <div class="textform">  Veuillez mettre l'id de l'etudiant : </div>
        <input type="number"  class="form-control" min="1" name ="Idetud" placeholder="Id de l'etudiant" requiered >
        <br>
        <div class="textform">  Veuillez mettre le nom du l'etudiant : </div>
        <input type="text"  class="form-control" name ="Nometudiant"  placeholder="Nom de l'etudiant" requiered >
        <br>
        <div class="textform"> Veuillez mettre le prenom de l'etudiant : </div>
        <input type="text"  class="form-control" name ="Prenometudiant" placeholder="Prenom de l'etudiant" requiered >
        <br>
        <div class="textform"> Veuillez mettre le mail de l'etudiant : </div>
        <input type="mail"  class="form-control" pattern =".+.com" name ="Mailetudiant" placeholder="Mail de l'etudiant" requiered >
        <br>
        <br>
        <button class="btn btn-primary" type="sudmit" name = "submit">Valider</button>
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
        $idetud=($_POST['Idetud']);
        $nometud=($_POST['Nometudiant']);
        $prenometud=($_POST['Prenometudiant']);
        $mailetud=($_POST['Mailetudiant']);
        $req = $bdd->prepare('INSERT INTO Etudiants VALUES (?,?,?,?)');
        $success = $req->execute(array($idetud,$nometud,$prenometud,$mailetud));
        if($success) {
            echo"<p style='color: green'>Etudiant enregistré</p>";
        } else {
            echo"<p style='color: red'>Erreur d'enregistrement</p>";
        }
    }
    ?>
    <h2 align = "center">
           <p> <a>Etudiants </a></p>
    </h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id de l'etudiant</th>
                <th>Nom de l'etudiant</th>
                <th>Prenom de l'etudiant</th>
                <th>Mail de l'etudiant</th>
            </tr>
        </thead>
        <tbody>
        <?php
            try
            {
            $bdd = new PDO('mysql: host=localhost;dbname=tpstage;charset=utf8','killian','killian');
            }
            catch(PDOException $e){
            die('Erreur : '.$e->getMessage());
            }
            $result = $bdd->prepare("SELECT * FROM Etudiants ");

            $result->execute();

            for($i=0; $row = $result->fetch(); $i++){

        ?>
            <tr>
                <td><label><?php echo $row['Idetud']; ?></label></td>
                <td><label><?php echo $row['NomEtud']; ?></label></td>
                <td><label><?php echo $row['PrenomEtud']; ?></label></td>
                <td><label><?php echo $row['MailEtud']; ?></label></td>
            <?php } ?>
        </tbody>
            </table>

<footer class="copy">
  <hr>
      Copyright &copy; Akinil - 2020 - All Right Reserved
  <hr/>


</footer>
</body>
</html>