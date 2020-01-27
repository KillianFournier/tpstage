<!DOCTYPE html>
<html align = "center">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <header><h1>Enregistrement des Tuteurs</h1></header>
    <br>
    <body>
    </body>
    <div class="menu">
    <li><a href="#">Mobile</a>
   <ul class ="sub">
   <li><a href="#">Lenovo</a></li> 
    <li><a href="#">Nokia</a></li>
    <li><a href="#">LAVA</a></li>
    </ul>
  </li>
  
   
  <li><a href="#">Laptop</a>
  <ul class ="sub">
  <li><a href="#">HP</a></li> 
    <li><a href="#">Dell</a></li>
    <li><a href="#">Lenovo</a></li>
 </ul>
  </li> 
  
  
  <li><a href="#">Fridge</a>
  <ul class ="sub">
  <li><a href="#">LG</a></li> 
    <li><a href="#">samsung</a></li>
    <li><a href="#">Kelvinator</a></li>
    </ul> 
     </li>
     
     
     
  <li><a href="#">Contact Us</a></li> 
  <li><a href="#">About Us</a></li> 
  </ul>
    </div>
	</div>
</div>
    </div>
    <form class="form" action="" method="POST">
    <p> 
        Veuillez mettre l'id du tuteur :
        <input  type="number" min="1" name ="Idtuteur" placeholder="Id du tuteur" requiered >
        <br>
        Veuillez mettre le nom du tuteur :
        <input type="text" name ="Nomtuteur" placeholder="Nom du tuteur" requiered >
        <br>
        Veuillez mettre le prenom du tuteur :
        <input type="text" name ="Prenomtuteur" placeholder="Prenom du tuteur" requiered >
        <br>
        Veuillez mettre le mail du tuteur :
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