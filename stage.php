<!DOCTYPE html>
<html align = "center">
<title>Enregistrement des stages</title>
<link rel="stylesheet" href="css.css"/>
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php 
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=tpstage;charset=utf8','killian','killian');
    }
    catch(exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>

    <header><h1>Enregistrement des Stages</h1></header>
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
                <li class="nav-item active"><a class="nav-link" href="stage.php">Enregistrement des stages</a></li>
                <li class="nav-item"><a class="nav-link" href="etudiant.php">Enregistrement des etudiants</a></li>
                <li class="nav-item"><a class="nav-link" href="tuteur.php">Enregistrement des tuteurs</a></li>
                <li class="nav-item"><a class="nav-link" href="entreprise.php">Enregistrement des entreprises</a></li>
                <li class="nav-item"><a class="nav-link" href="total.php">Voir les donn&eacute;es enregistrer</a></li>
            </ul>
        </div>
    <br>
</nav>
    <body>

    <form class="form" action="" method="POST">
    <p class="deroulant">     
    <div class="textform"> Veuillez mettre le nom de l'etudiant :</div>
        <select name="etudiant" class="form-control">
    <?php 
    $reqetud = $bdd->prepare("SELECT * FROM Etudiants");
    $reqetud->execute();
    for($i=0; $row = $reqetud->fetch(); $i++){
        echo'<option value="'.$row['Idetud'].'">'.$row['NomEtud'].'</option>';
    }
    ?>
     </p>  
    </select>
        <br>
        <div class="textform"> Veuillez mettre la date de debut du stage : </div>
        <input type="date" class="form-control" name ="Datedeb" requiered >
        <br>
        <div class="textform"> Veuillez mettre la date de fin du stage : </div>
        <input type="date" class="form-control" name ="Datefin" requiered >
        <br>
        <div class="textform"> Veuillez mettre le nom du tuteur : </div>
    <select name="tuteur" class="form-control">
    <?php 
    $reqtuteur = $bdd->prepare("SELECT * FROM Tuteur");
    $reqtuteur->execute();
    for($i=0; $row = $reqtuteur->fetch(); $i++){
        echo'<option value="'.$row['id'].'">'.$row['nomtut'].'</option>';
    }
    ?>
    </select>
        <br>
        <div class="textform"> Veuillez mettre le nom de l'entreprise : </div>
        <select name="entreprise" class="form-control">
    <?php 
    $reqentreprise = $bdd->prepare("SELECT * FROM Entreprise");
    $reqentreprise->execute();
    for($i=0; $row = $reqentreprise->fetch(); $i++){
        echo'<option value="'.$row['identreprise'].'">'.$row['denomination'].'</option>';
    }
    ?>
    </select >
        <br>
        <div class="textform"> Description :</div>
        <input type="text" class="form-control" name ="Description" placeholder="Description" requiered >
        <br>
       <button  class="btn btn-primary" type="submit" name = "submit">Valider</button>

    </form>
    <?php

    if(isset($_POST['submit'])){
        $id=($_POST['etudiant']);
        $datedebut=($_POST['Datedeb']);
        $datefin=($_POST['Datefin']);
        $idtuteur=($_POST['tuteur']);
        $identreprise=($_POST['entreprise']);
        $description=($_POST['Description']);
        $req = $bdd->prepare('INSERT INTO Stage VALUES (?,?,?,?,?,?)');
        $success = $req->execute(array($id,$datedebut,$datefin,$idtuteur,$identreprise,$description));
        if($success) {
            echo"<p style='color: green'>Stage enregistré</p>";
        } else {
            echo"<p style='color: red'>Erreur d'enregistrement</p>";
        }
    }
    ?>
 <br>
 <h2 align = "center">
           <p> Stages Enregistr&eacute;</p>
    </h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id de l'etudiant</th>
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
            $result = $bdd->prepare("SELECT * FROM Stage ");

            $result->execute();

            for($i=0; $row = $result->fetch(); $i++){

        ?>
            <tr>
                <td><label><?php echo $row['Idetud']; ?></label></td>
                <td><label><?php echo $row['Datedeb']; ?></label></td>
                <td><label><?php echo $row['Datefin']; ?></label></td>
                <td><label><?php echo $row['Idtuteur']; ?></label></td>
                <td><label><?php echo $row['Identreprise']; ?></label></td>
                <td><label><?php echo $row['Description']; ?></label></td>
            </tr>
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