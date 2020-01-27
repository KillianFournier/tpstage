<!DOCTYPE html>
<html align = "center">
<title>Enregistrement des entreprises</title>
<link rel="stylesheet" href="css.css"/>
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">
    <header><h1>Enregistrement des Entreprises</h1></header>
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
    <form class="form" action="" method="POST">
        <p> 
        <div class="textform"> Veuillez mettre l'id de l'entreprise :</div>
        <input type="number" min="1" name ="Ident" placeholder="Id de l'entreprise" requiered >
        <br>
        <div class="textform"> Veuillez mettre le nom de l'entreprise :</div>
        <input type="text" name ="Denomination" placeholder="Nom de l'entreprise" requiered >
        <br>
        <br>
       <button class=submit type="submit" name = "submit">Valider</button>
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
