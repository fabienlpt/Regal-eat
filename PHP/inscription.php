<?php

        if (isset($_POST['valider'])) {
          $connexion=mysqli_connect("localhost","root","","projet");
                    echo mysqli_connect_error();    // affichera un message si la connexion a echoué
                    
          $prenom = $_POST['prenom'];
          $nom = $_POST['nom'];
          $tel = $_POST['tel'];
          $email = $_POST['email'];

          $mdp="";        //création d'un mdp aléatoire
            for($i=0; $i<10;++$i){
              $mdp .=chr(rand(65,90));
            }
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
              $req = "SELECT * FROM Personnes WHERE email = '$email'";
            $res = mysqli_query($connexion,$req);
            if(mysqli_num_rows($res)){
                  $info = "Vous avez déjà un compte";
            }else{
              mail($email,'[no-reply]Votre mot de passe', "Bonjour $prenom $nom voici votre mot de passe : $mdp");
              $req ="INSERT INTO Personnes VALUES('$prenom','$nom','$tel','$email','$mdp')";  //envoie les données à la table
              mysqli_query($connexion,$req);
              $info = "Votre mot de passe vous à été envoyer par mail";
            }             
            }else{
                  $info = "Adresse email invalide";
            }
          mysqli_close($connexion);
        }
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Inscription</title>
        <link rel="stylesheet" type="text/css" href="../CSS/inscription.css"/>
        <meta charset="utf-8" />
    </head>
 
    <body>
      <div class="image"></div> 
      <div class="corp">
      <div class="text">
        <h1>Inscription | <a href="connexion.php">Connexion</a></h1>
        <form action="inscription.php" method="post">
            <p><label for="prenom" class="obligatoire">Prénom</label> <br/>
                <input type="text" name="prenom" id="prenom"  placeholder="Prenom" required/></p>
            <p><label for="nom" class="obligatoire">Nom</label> <br/>
                <input type="text" name="nom" id="nom"  placeholder="Nom" required/></p>
            <p><label for="tel">Téléphone</label> <br/>
                <input type="text" name="tel" id="tel"  placeholder="Numero de Téléphone" /></p>
            <p><label for="email" class="obligatoire">Email</label> <br/>
                <input type="email" name="email" id="email"  placeholder="Email" required/></p>
                 <?php if(isset($info)) { echo '<span>'.$info.'</span>'; }
                    else{echo'';}?>
            <p><input type="submit" name="valider" value="Valider" class="boutons"/></p>
        </form>
        <p id="info">(Les champs muni d'une <span>*</span> doivent être rempli 
        obligatoirement pour passer à la suite.)</p>
    </div>
    </div>
    </body>
</html>
