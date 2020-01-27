<!DOCTYPE html>
<html align = "center">
<title>Enregistrement des etudiants</title>
<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css.css"/>
    <header><h1>Enregistrement des Etudiants</h1></header>
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
       <div class="textform">  Veuillez mettre l'id de l'etudiant : </div>
        <input type="number" min="1" name ="Idetud" placeholder="Id de l'etudiant" requiered >
        <br>
        <div class="textform">  Veuillez mettre le nom du l'etudiant : </div>
        <input type="text" name ="Nometudiant"  placeholder="Nom de l'etudiant" requiered >
        <br>
        <div class="textform"> Veuillez mettre le prenom de l'etudiant : </div>
        <input type="text" name ="Prenometudiant" placeholder="Prenom de l'etudiant" requiered >
        <br>
        <div class="textform"> Veuillez mettre le mail de l'etudiant : </div>
        <input type="mail" pattern =".+.com" name ="Mailetudiant" placeholder="Mail de l'etudiant" requiered >
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

<footer class="copy">
  <hr>
      Copyright &copy; Akinil - 2020 - All Right Reserved
  <hr/>


</footer>

</html>