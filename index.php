<?php
        session_start();
        if(isset($_SESSION['email'])){
          $block1="Espace membre";
          $block2="Se déconnecter";
          $chemin1="PHP/myspace.php";
          $chemin2="PHP/deconnexion.php";
        }else{
          $block1="Connexion";
          $block2="Inscription";
          $chemin1="PHP/connexion.php";
          $chemin2="PHP/inscription.php";
        }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Regal'eat</title>
    <link rel="stylesheet" href="index.css"/>
    <link rel="icon" type="image/png" sizes="16x16" href="images/fav-icon.png">

    <!--Afficher le bouton pour remonter en haut de page et le menu burger lorsque l'on est à plus de 50pixels du haut de page-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script>
                jQuery(function(){
                    $(function () {
                        $(window).scroll(function () {
                            if ($(this).scrollTop() > 50 ) { 
                                $('#scrollUp').css('right','10px');
                                $('#wrap').css('left','10px');
                            } else { 
                                $('#scrollUp').removeAttr( 'style' );
                                $('#wrap').removeAttr( 'style' );
                            }
     
                        });
                    });
                });
    </script>
 
  </head> 
  
  <body>
    <nav>
      <ul>
        <div class="gauche">
          <li><img height="50" width="50" src="images/logo.png" alt=""/></li>
          <li class="deroulant">Catégories
            <ul class="sous">
              <li><a href="?categorie=entree">Entrée</a></li>
              <li><a href="?categorie=plat">Plat</a></li>
              <li><a href="?categorie=dessert">Dessert</a></li>
            </ul>
          </li>
        </div>
        <li><div class="centre">
          <form method="post"><input type="search" name="recherche" id="recherche" placeholder="Rechercher" /></form>
        </div> </li>
        <div class="droite">
          <li><a href="PHP/newarticle.php">Nouvel Article</a></li>
          <li class="deroulant"><img height="25" width="25" src="<?php if(isset($_SESSION['email'])){echo("images/login.png");}else{echo("images/logout.png");} ?>" alt=""/>
            <ul class="sous">
              <li><a  <?php if($block1 == "Espace membre"){ echo(" href='$chemin1' TARGET=_BLANK");}else{echo("href='$chemin1'");} ?> ><?php echo($block1)?></a></li>
              <li><a href="<?php echo($chemin2) ?>"><?php echo($block2)?></a></li>
            </ul>
          </li>
        </div>
      </ul>
    </nav>
    <div class="bacgauche"></div>
    <div class="bacdroite"></div>
    <div id="wrap">
      <header class="header">
        <nav class="nav">
          <a href="#wrap" id="open">
            <img src="images/burger.png" alt=""/>
          </a>
          <a href="#" id="close">×</a>
          <h1><a href="#">Menu burger</a></h1>
          <a <?php if($block1 == "Espace membre"){ echo(" href='$chemin1' TARGET=_BLANK");}else{echo("href='$chemin1'");} ?>>Mon compte</a>
          <a href="PHP/newarticle.php">Nouvel article</a>
          <a href="PHP/info.php" TARGET=_BLANK>à propos</a>
        </nav>
      </header>
    </div>
    <div class="corp">
        <?php 

          $connexion=mysqli_connect("localhost","root","","projet");
          echo mysqli_connect_error();    // affichera un message si la connexion a echoué
                        
          $reqarticle = mysqli_query($connexion, "SELECT * FROM articles");
          if(isset($_POST['recherche'])){
            $recherche=$_POST['recherche'];
              echo("<p id='leg'>Résultat pour votre recherche : ".$recherche."</p>");
              $reqarticle = mysqli_query($connexion, "SELECT * FROM articles WHERE titre LIKE '%$recherche%'");
              if ($article = mysqli_fetch_array($reqarticle)){
                echo("<div class='div_cont'>");
                echo("<h2 class='titre_article'>".$article['titre']."</h2>");
                echo("<a href='PHP/article.php?article=".$article['id']."'><img src='images/".$article['img'].".jpg' alt=''/></a>");
                echo("</div>");
                echo("<hr>");
                while ($article = mysqli_fetch_array($reqarticle)){
                  echo("<div class='div_cont'>");
                  echo("<h2 class='titre_article'>".$article['titre']."</h2>");
                  echo("<a href='PHP/article.php?article=".$article['id']."'><img src='images/".$article['img'].".jpg' alt=''/></a>");
                  echo("</div>");
                  echo("<hr>");
                }
              }else{
                echo("Erreur aucune recette ne correspond à votre recherche.");
              }
          }else{
            echo("<div id='articles'>");
            if(isset($_GET['categorie'])){
              $categorie=$_GET['categorie'];
              $reqarticle = mysqli_query($connexion, "SELECT * FROM articles WHERE  type = '$categorie'");
              if ($article = mysqli_fetch_array($reqarticle)){
                echo("<div class='div_cont'>");
                echo("<h2 class='titre_article'>".$article['titre']."</h2>");
                echo("<a href='PHP/article.php?article=".$article['id']."'><img src='images/".$article['img'].".jpg' alt=''/></a>");
                echo("</div>");
                while ($article = mysqli_fetch_array($reqarticle)){
                  echo("<div class='div_cont'>");
                  echo("<h2 class='titre_article'>".$article['titre']."</h2>");
                  echo("<a href='PHP/article.php?article=".$article['id']."'><img src='images/".$article['img'].".jpg' alt=''/></a>");
                  echo("</div>");
                }
              }else{
                echo("Erreur aucune recette ne correspond à votre recherche.");
              }
            }else{
              $reqarticle = mysqli_query($connexion, "SELECT * FROM articles");
              while ($article = mysqli_fetch_array($reqarticle)){
                echo("<div class='div_cont'>");
                echo("<h2 class='titre_article'>".$article['titre']."</h2>");
                echo("<a href='PHP/article.php?article=".$article['id']."'><img src='images/".$article['img'].".jpg' alt=''/></a>");
                echo("</div>");
              }
            }
          }
          mysqli_close($connexion);
          echo("</div>");
        ?>
      <div id="scrollUp">
        <a href=#top><img height="50" width="50" src="images/uparrow.png" alt=""/></a>
      </div>
    </div>
  </body>
</html>