<!DOCTYPE html>
<html align = "center">
<title>Données enregistrées</title>
<link rel="stylesheet" href="css.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">
    <header><h1>Total des donnees acquise</h1></header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div id="content">
            
            <a href='accueil.php?deconnexion=true' class="btn btn-danger"><span>Déconnexion</span></a>
            
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
                    echo "<br>Bonjour <Strong>$user</Strong>, vous êtes connectés";
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
                <li class="nav-item"><a class="nav-link" href="entreprise.php">Enregistrement des entreprises</a></li>
                <li class="nav-item active"><a class="nav-link" href="total.php">Voir les donn&eacute;es enregistrer</a></li>
                <!-- Ect .. -->
            </ul>
        </div>
    <br>
    </nav>
    <body>
 


    <h2 align = "center">
           <p> <a class="titredon"  href="stage.php"> Stages </a></p>
    </h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id de l'etudiant</th>
                <th>Nom de l'etudiant</th>
                <th>Date de debut</th>
                <th>Date de fin</th>
                <th>Id du tuteur</th>
                <th>Id de l'entreprise</th>
                <th>Description</th>
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
            $result = $bdd->prepare("SELECT * FROM Stage INNER JOIN Etudiants Where Etudiants.Idetud = Stage.Idetud");

            $result->execute();

            for($i=0; $row = $result->fetch(); $i++){

        ?>
            <tr>
                <td><label><?php echo $row['Idetud']; ?></label></td>
                <td><label><?php echo $row['NomEtud']; ?></label></td>
                <td><label><?php echo $row['Datedeb']; ?></label></td>
                <td><label><?php echo $row['Datefin']; ?></label></td>
                <td><label><?php echo $row['Idtuteur']; ?></label></td>
                <td><label><?php echo $row['Identreprise']; ?></label></td>
                <td><label><?php echo $row['Description']; ?></label></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <h2 align = "center">
           <p> <a class="titredon"  href="etudiant.php">Etudiants </a></p>
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
 

      
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id des tuteurs</th>
                <th>Nom des tuteurs</th>
                <th>Prenom des tuteurs</th>
                <th>Mail de l'etudiant</th>
            </tr>
        </thead>
        <tbody>
        <h2 align = "center">
      
        <h2 align = "center">
            <p> <a class="titredon"  href="tuteur.php">Tuteurs </a></p>
    </h2>
        <?php
            try
            {
            $bdd = new PDO('mysql: host=localhost;dbname=tpstage;charset=utf8','killian','killian');
            }
            catch(PDOException $e){
            die('Erreur : '.$e->getMessage());
            }
            $result = $bdd->prepare("SELECT * FROM Tuteur ");

            $result->execute();

            for($i=0; $row = $result->fetch(); $i++){

        ?>
            <tr>
                <td><label><?php echo $row['id']; ?></label></td>
                <td><label><?php echo $row['nomtut']; ?></label></td>
                <td><label><?php echo $row['prenomtut']; ?></label></td>
                <td><label><?php echo $row['mailtut']; ?></label></td>
            <?php } ?>
        </tbody>
            </table>
 

            <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id des Entreprises</th>
                <th>Nom des Entreprises</th>

            </tr>
        </thead>
        <tbody>
        <h2 align = "center">
            <p> <a class="titredon"  href="entreprise.php">Entreprises </a></p>
    </h2>
        <?php
            try
            {
            $bdd = new PDO('mysql: host=localhost;dbname=tpstage;charset=utf8','killian','killian');
            }
            catch(PDOException $e){
            die('Erreur : '.$e->getMessage());
            }
            $result = $bdd->prepare("SELECT * FROM Entreprise ");

            $result->execute();

            for($i=0; $row = $result->fetch(); $i++){

        ?>
            <tr>
                <td><label><?php echo $row['identreprise']; ?></label></td>
                <td><label><?php echo $row['denomination']; ?></label></td>
            <?php } ?>
        </tbody>
            </table>
            </body>
            <footer class="copy">
    <hr>
        Copyright &copy; Akinil - 2020 - All Right Reserved
    <hr/>

    </footer>
    </html>