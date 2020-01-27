<!DOCTYPE html>
<html align = "center">
<title>Enregistrement des stages</title>
<link rel="stylesheet" href="css.css"/>
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">
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
    <div class="nav">
            <ul>
                <li><a href="accueil.html">Accueil</a></li>
                <li><a href="stage.php">Enregistrement des stages</a></li>
                <li><a href="etudiant.php">Enregistrement des etudiants</a></li>
                <li><a href="tuteur.php">Enregistrement des tuteurs</a></li>
                <li><a href="entreprise.php">Enregistrement des entreprises</a></li>
                <li><a href="total.php">Voir les donn&eacute;es enregistrer</a></li>
                <li><a href="contact.html">Nous contacter</a></li>
                <!-- Ect .. -->
            </ul>
        </div>
    <br>
    <body>
    </body>
    <form class="form" action="" method="POST">
    <p class="deroulant">     
    <div class="textform"> Veuillez mettre le nom de l'etudiant :</div>
        <select name="etudiant">
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
        <input type="date" name ="Datedeb" requiered >
        <br>
        <div class="textform"> Veuillez mettre la date de fin du stage : </div>
        <input type="date" name ="Datefin" requiered >
        <br>
        <div class="textform"> Veuillez mettre le nom du tuteur : </div>
    <select name="tuteur">
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
        <select name="entreprise">
    <?php 
    $reqentreprise = $bdd->prepare("SELECT * FROM Entreprise");
    $reqentreprise->execute();
    for($i=0; $row = $reqentreprise->fetch(); $i++){
        echo'<option value="'.$row['identreprise'].'">'.$row['denomination'].'</option>';
    }
    ?>
    </select>
        <br>
        <div class="textform"> Description :</div>
        <input type="text" name ="Description" placeholder="Description" requiered >
        <br>
        <br>
       <button class=submit type="submit" name = "submit">Valider</button>
        <p>
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

    <footer class="copy">
  <hr>
      Copyright &copy; Akinil - 2020 - All Right Reserved
  <hr/>


</footer>

</html>