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
            $varSql = "SELECT nom,prenom FROM auteur";
            $idRequete = executeRequete($cnx,$varSql);
            while($ligne=$idRequete->fetch()){
                echo $ligne['nom'].' '.$ligne['prenom'].'-'.'<br>';
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
