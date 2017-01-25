<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
        <body>
            <?php
            require_once 'include/infoconnexion.php';
            require_once 'include/connexion.php';
            require_once 'include/executeRequete.php';
            
            $nom= $_POST["nom"] ;
            $prenom= $_POST["prenom"];
            $date_naissance= $_POST["date_naissance"];
            
            if (isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['date_naissance'])) {
            // on affiche nos résultats
            echo 'Votre nom est '.$_POST['nom'].' ,votre prénom est '.$_POST['prenom'].' , et votre date de naissance est '.$_POST['date_naissance'];
            }
            $cnx=connexion(UTILISATEUR,MOTDEPASSE,SERVER,BASEDEDONNEES);
            echo "<h2>Les auteurs du XVIII eme siecle</h2>";
            
            $varSql = "INSERT INTO auteur(nom,prenom,date_naissance) VALUES('$nom','$prenom','$date_naissance')"; 
           
            $idRequete = executeRequete($cnx,$varSql);
            ?>
            <p>Ajouter un auteur</p>

            <form method="post" action="formAjout.php">
               
                <p> 
                    Votre nom :</br>
                    <input type="text" name="nom" id="nom" placeholder="Ex : Lemaire" size="30" maxlength="10" />
                </p>
                <p>
                    Votre prénom :</br>
                    <input type="text" name="prenom" id="prenom" placeholder="Ex : Sophie" size="30" maxlength="10" />
                </p>
                <p>
                    Votre année de naissance :</br>
                    <input type="text" name="date_naissance" id="date_naissance" placeholder="Ex : 1974" size="30" maxlength="10" />
                </p>
                <input type="submit" value="Valider" />
            </form>


        </body>
</html>