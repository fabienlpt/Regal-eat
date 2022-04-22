<?php
        session_start();
        if(isset($_SESSION['email'])){
          $chemin1="PHP/myspace.php";
          $com="Donnez nous votre avis";
          //Ajouter un commentaire à la base de donnée si l'utilisateur est connecté
          if(isset($_POST['valider'])){
            $connexion=mysqli_connect("localhost","root","","projet");
            echo mysqli_connect_error();    // affichera un message si la connexion a echoué
            $email=$_SESSION['email'];
            $requete = "SELECT * FROM Personnes WHERE email = '$email'";
            $res = mysqli_query($connexion,$requete);
            $user = mysqli_fetch_array($res);
            $id=$_GET['article']; 
            $auteur=$user['nom']." ".$user['prenom'];
            $texte = $_POST['commentaire'];
            //permettre d'envoyer les appostrophes à la base de donnée
            $texte = addslashes($texte);       
            $req ="INSERT INTO commentaire (id_article, auteur, texte) VALUES('$id','$auteur','$texte')";  //envoie les données à la table
            mysqli_query($connexion,$req);
            mysqli_close($connexion);
            header("location:article.php?article=$id");
          }
        }else{
          //empecher l'ecriture d'un commentaire si l'utilisateur n'est pas connecté
          $chemin1="PHP/connexion.php";
          $com="Veuillez vous connecter pour insérer un commentaire";
          $error="Pas connecté";
        }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>A la Pate</title>
    <link rel="stylesheet" href="../CSS/article.css"/>
  </head>
  <!-- Faire un bouton burger permettant de naviguer entre les pages -->
  <body>
    <div class="bacgauche"></div>
    <div class="bacdroite"></div>
    <div id="wrap">
      <header class="header">
        <nav class="nav">
          <a href="#wrap" id="open">
            <img src="../images/burger.png" alt=""/>
          </a>
          <a href="#" id="close">×</a>
          <h1><a href="../">Menu</a></h1>
          <a href="../<?php echo($chemin1) ?>" TARGET=_BLANK>Mon compte</a>
          <a href="../PHP/newarticle.php">Nouvel article</a>
          <a href="../PHP/info.php">à propos</a>
        </nav>
      </header>
    </div>
    <div class="corp">
        <?php 
          /*Afficher 1 article sélectionner en fonction de son id*/
          $connexion=mysqli_connect("localhost","root","","projet");
          echo mysqli_connect_error();    // affichera un message si la connexion a echoué
          $id=$_GET['article'];
          $reqarticle = mysqli_query($connexion, "SELECT * FROM articles WHERE id = '$id'");
          if($reqarticle){
            $article = mysqli_fetch_array($reqarticle);
            echo("<div id='div_cont'>");
            echo("<h2>".$article['titre']."</h2>");
            echo("<img src='../images/".$article['img'].".jpg' alt=''/>");
            echo("<h3>Ingrédients :</h3>");
            echo nl2br("<p>".$article['ingrédients']."</p>");
            echo("<h3>Recette :</h3>");
            echo nl2br("<p>".$article['recette']."</p>");
            echo("<fieldset>");
            echo("<p>Type :</p>");
            echo($article['type']);
            echo("<p>Date de création :</p>");
            echo(implode('/', array_reverse(explode('-', $article['dates']))));
            echo("</fieldset>");
            echo("</div>");
            mysqli_close($connexion);
          }
        ?>
        <!--Pour écrire un commentaires si l'utilisateur est connecté-->
        <form method="post">
            <p><label for="commentaire"><?php echo($com);?></label> <br/>
                <textarea id="commentaire" name="commentaire" rows="10" cols="100" <?php if(isset($error)){echo("disabled='disabled'"); } ?> ></textarea></p>
            <p><input type="submit" name="valider" value="valider" class="boutons" <?php if(isset($error)){echo("disabled='disabled'"); } ?>/></p>
        </form>
        <?php // écriture de tout les commentaires correspondant à l'article sélectionner
          $connexion=mysqli_connect("localhost","root","","projet");
          echo mysqli_connect_error();    // affichera un message si la connexion a echoué 
          $reqcomment = mysqli_query($connexion, "SELECT * FROM commentaire WHERE id_article = '$id'");
          if($reqcomment){
            echo("<div id='comment'>");
            // echo("<p id='leg'>".$tete."</p>");
            while ($comment = mysqli_fetch_array($reqcomment)){
              echo("<div class='div_com'>");
              echo("<fieldset>");
              //Mettre la date de le format JJ/MM/AAAA et l'heure en format HH:MM:SS
              $date=explode(' ', $comment['dates']);
              $d=$date[0];
              $h=$date[1];
              echo("<legend>Posté le : ".implode('/', array_reverse(explode('-', $d)))." à ".$h."</legend>");
              echo("<h2>".$comment['auteur']."</h2>");
              echo("<p>".$comment['texte']."</p>");
              echo("</fieldset>");
              echo("</div>");
              echo("<hr>");
            }
            echo("</div>");
          }
          mysqli_close($connexion);
        ?>
    </div>
  </body>
</html>