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
            echo "<h2>Formulaire de consultation</h2>";
            if(isset($_POST['identifiant'])){
            $id_auteur=$_POST['identifiant'];
            $varSql = "SELECT nom,prenom,date_naissance FROM auteur WHERE id_auteur= ?";
            $idRequete = executeRequete($cnx,$varSql,array($id_auteur));
                echo '<table>';
            while($ligne=$idRequete->fetch()){
                
                echo '<form method="POST" action="listeAuteur.php">';
                echo '<tr>';
                echo '<td>'.'<input type="text" name="id" value="'. $ligne['nom'].'">'.'</td>';
                echo '<td>'.'<input type="text" name="id" value="'. $ligne['prenom'].'">'.'</td>';
                echo '<td>'.'<input type="text" name="id" value="'.$ligne['date_naissance'].'">'.'</td>';
                echo '<td>'.'<input type="submit" value="Retour" />'.'</td>';
                echo '</table>';
                echo '</form>';
                 
                }
            }
            ?>
            

        </body>
</html>
