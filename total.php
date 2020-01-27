<!DOCTYPE html>
<html align = "center">
<title>Données enregistrées</title>
<link rel="stylesheet" href="css.css"/>
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet">
    <header><h1>Total des donnees acquise</h1></header>
    <div class="nav">
            <ul>
                <li>
                    <a href="accueil.html">Accueil</a>
                </li>
                <li>
                    <a href="stage.php">Enregistrement des stages</a>
                </li>
                <li>
                    <a href="etudiant.php">Enregistrement des etudiants</a>
                </li>
                <li>
                    <a href="tuteur.php">Enregistrement des tuteurs</a>
                </li>
                <li>
                    <a href="entreprise.php">Enregistrement des entreprises</a>
                </li>
                <li>
                    <a href="total.php">Voir les donn&eacute;es enregistrer</a>
                </li>
                <li>
                    <a href="contact.html">Nous contacter</a>
                </li>
            </ul>
        </div>
    <br>
    <body>
    </body>


    <h2 align = "center">
           <p> <a class="titredon"  href="stage.php"> Stages </a></p>
    </h2>
    <table border="1" cellspacing="3" cellpadding="8" width="100%" align : center>
        <thead>
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
    </html>