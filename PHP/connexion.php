<?php
                session_start();
                if (isset($_POST['valider'])) {
                    $connexion=mysqli_connect("localhost","root","","projet");
                    echo mysqli_connect_error();    // affichera un message si la connexion a echoué
                    
                    $email = $_POST['email'];
                    $mdp = $_POST['mdp'];
                    
                    $requete = "SELECT * FROM Personnes WHERE email = '$email'";
                    $res = mysqli_query($connexion,$requete);
                    if(mysqli_num_rows($res)){      //vérifie que l'adresse mail rentrée est présente dans la base de données
                        $user = mysqli_fetch_array($res);
                        if($user['mdp']!=$mdp){
                            $error = "mauvais mot de passe";
                        }else{
                            $_SESSION['email']=$user['email'];
                            header('Location: ../index.php');
                        }
                    }else{
                        $error = "Vous n'êtes pas inscrit";
                    }
                    echo mysqli_error($connexion); // affichera un message si la requête a échoué
                    mysqli_close($connexion);
                }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Connexion</title>
        <link rel="stylesheet" type="text/css" href="../CSS/inscription.css"/>
        <meta charset="utf-8"/>
    </head>
 
    <body>
        <div class="image"></div> 
        <div class="corp">
        <div class="text">
            <h1><a href="inscription.php">Inscription</a> | Connexion</h1>
            <form action="connexion.php" method="post">
                <p><label for="email" class="obligatoire">Email</label> <br/>
                    <input type="email" name="email" id="email" placeholder="Email" /></p>
                <p><label for="mdp" class="obligatoire">Mot de passe</label> <br/> 
                    <input type="password" name="mdp" id="mdp" value="" placeholder="Mot de Passe" /></p>
                    <?php if(isset($error)) { echo '<span>'.$error.'</span>'; }
                    else{echo'';}?>
                <p><input type="submit" name="valider" value="Valider" class="boutons"/></p>
            </form> 
            <form action="connexion.php" method="post">
                <input type="submit" id="oublie" name="oublie" value="Mot de passe oublié ?" class="boutons"/>
            </form>
            <p id="info">(Les champs muni d'une <span>*</span> doivent être rempli 
            obligatoirement pour passer à la suite.)</p>
        </div>
        </div>
    </body>
</html>
