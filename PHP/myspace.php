<?php
        session_start();
        if(isset($_SESSION['email'])){
          $email=$_SESSION['email'];
          $connexion=mysqli_connect("localhost","root","","projet");
          $requete = "SELECT * FROM Personnes WHERE email = '$email'";
          $res = mysqli_query($connexion,$requete);
          $user = mysqli_fetch_array($res);
          $nom=$user['nom'];
          $prenom=$user['prenom'];
          $mdp=$user['mdp'];
          $tel=$user['tel'];
        }else{
          header("location:connexion.php");
        }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Espace Membre</title>
    <link rel="stylesheet" href="../index.css"/>
  </head>
  
  <body>
    <div class="bacgauche"></div>
    <div class="bacdroite"></div>
    <div id="wrap">
     
    </div>
    <div class="corp">
      <h1>Espace Membre</h1>
      <h4>Nom</h4>
      <?php echo($nom); ?>
      <h4>Prenom</h4>
      <?php echo($prenom); ?>
      <h4>mdp</h4> 
      <?php echo($mdp); ?>
      <h4>Tel</h4>
      <?php echo($tel);  if(isset($_POST['modifier'])){ ?>
        <form method="post">
          <input type="text" name="tel" value="tel">
      <?php } ?>
      <h4>Email</h4>
      <?php echo($email); ?>
      <form method="post">
        <br/>
        <?php if(isset($_POST['modifier'])){?>
          <input type="button" name="valider" value="valider"/>
          </form>
        <?php }else{ ?>
          <input type="button" name="modifier" value="modifier"/>
        <?php } ?>
      </form>
    </div>
  </body>
</html>