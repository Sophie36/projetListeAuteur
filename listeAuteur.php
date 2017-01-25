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
            $cnx=connexion(UTILISATEUR,MOTDEPASSE,SERVER,BASEDEDONNEES);
            echo "<h2>Les auteurs du XVIII eme siecle</h2>";
            $varSql = "SELECT id_auteur,nom,prenom FROM auteur";
            $idRequete = executeRequete($cnx,$varSql);
            while($ligne=$idRequete->fetch()){
                
                echo $ligne['nom'].' '.$ligne['prenom'];
                echo '<form method="post" action="formConsul.php">';
                echo '<input type="hidden" name="identifiant" value=""'.$ligne['id_auteur'].'"'.'>'.'<input type="submit" value="C"/>'.'</form>';
                echo '<form method="post" action="formModif.php">';
                echo '<input type="hidden" name="identifiant" value=""'.$ligne['id_auteur'].'"'.'>'.'<input type="submit" value="M"/>'.'</form>';
                echo '<form method="post" action="formSup.php">';
                echo '<input type="hidden" name="identifiant" value=""'.$ligne['id_auteur'].'"'.'>'.'<input type="submit" value="S"/>'.'</form>';
                
                
            }
            ?>
            <form method="post" action="formAjout.php">
                <p>
                <label>Ajouter un auteur</label></br>
                <input type="submit" value="Ajouter" />
                
                
                
                </p>
            </form>
        </body>
</html>
