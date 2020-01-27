<!DOCTYPE html>
<html align = "center">
<title>Enregistrement des tuteurs</title>
<link rel="stylesheet" href="css.css"/>
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">

    <header><h1>Enregistrement des Tuteurs</h1></header>
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
    <p> 
    <div class="textform"> Veuillez mettre l'id du tuteur :</div>
        <input  type="number" min="1" name ="Idtuteur" placeholder="Id du tuteur" requiered >
        <br>
        <div class="textform"> Veuillez mettre le nom du tuteur :</div>
        <input type="text" name ="Nomtuteur" placeholder="Nom du tuteur" requiered >
        <br>
        <div class="textform"> Veuillez mettre le prenom du tuteur :</div>
        <input type="text" name ="Prenomtuteur" placeholder="Prenom du tuteur" requiered >
        <br>
        <div class="textform"> Veuillez mettre le mail du tuteur :</div>
        <input type="mail" name ="Mailtuteur" placeholder="Mail du tuteur"requiered >
        <br>
        <br>
        <button class=submit type="submit" name = "submit">Valider</button>
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
        if($success) {
            echo"<p style='color: green'>Tuteur enregistré</p>";
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