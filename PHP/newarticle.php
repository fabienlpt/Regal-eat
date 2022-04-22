<?php
        session_start();
        if(empty($_SESSION['email'])){
          header('Location: ../');
        }
        if (isset($_POST['valider'])) {
          $connexion=mysqli_connect("localhost","root","","projet");
                    echo mysqli_connect_error();    // affichera un message si la connexion a echoué
                    
          $titre = $_POST['titre'];
          $type=$_POST['select'];
          $ingredients = $_POST['ingredients'];
          $ingredients = addslashes($ingredients); 
          $recette = $_POST['recette'];
          $recette = addslashes($recette); 
          $image = $_POST['image'];
        
          $req ="INSERT INTO articles (titre, type, ingrédients, recette, img) VALUES('$titre','$type','$ingredients','$recette','$image')";  //envoie les données à la table
          mysqli_query($connexion,$req);
          mysqli_close($connexion);
        }
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>CREER UN ARTCILE</title> 
        <link rel="stylesheet" type="text/css" href="../CSS/newarticle.css"/>
        <meta charset="utf-8" />
    </head>
 
    <body>
      <div class="image"></div> 
      <div class="corp">
      <div class="text">
        <h1>Nouvelle Recette</h1>
        <form action="newarticle.php" method="post">
            <h3><label for="type" class="obligatoire">Type</label></h3>
            <table>
              <tr>
                <th>Entrée</th><th>Plat</th><th>Dessert</th>
              </tr>
              <tr>
                <td><input type="radio" name="select" value="entree" id="type"/></td>
                <td><input type="radio" name="select" value="plat"/></td>
                <td><input type="radio" name="select" value="dessert"/></td>
              </tr>
            </table>
            <p><label for="titre" class="obligatoire">Titre</label> <br/>
                <input type="text" name="titre" id="titre"  placeholder="Titre" required/></p>
            <p><label for="ingredients" class="obligatoire">Ingrédients :</label> <br/>
                <textarea id="ingredients" name="ingredients" rows="8" cols="30"></textarea></p>
            <p><label for="recette" class="obligatoire">Recette</label> <br/>
                <textarea id="recette" name="recette" rows="8" cols="70"></textarea></p>
            <p><label for="image" class="obligatoire">Image</label> <br/>
                <input type="text" name="image" id="image"  placeholder="Image" required/></p>
            <p><input type="submit" name="valider" value="Valider" class="boutons"/></p>
        </form>
        <p id="info">(Les champs muni d'une <span>*</span> doivent être rempli 
        obligatoirement pour passer à la suite.)</p>
    </div>
    </div>
    </body>
</html>
