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
            echo '<table>';
            echo '<tr>';
            echo '<th>'.'Nom'.'</th>';
            echo '<th>'.'Prenom'.'</th>';
            echo '<th>'.'Action'.'</th>';
            echo '</tr>';
            while($ligne=$idRequete->fetch()){
                echo '<tr>';
                echo '<td>'. $ligne['nom'].'</td>';
                echo '<td>'. $ligne['prenom'].'</td>';
                echo '<td>'.'<form method="post" action="formConsul.php">'.'<input type="hidden" name="identifiant" value="'.$ligne['id_auteur'].'"'.'>'.'<input type="submit" value="C" />'.'</form>'.'</td>';
                echo '<td>'.'<form method="post" action="formModif.php">'.'<input type="hidden" name="identifiant" value="'.$ligne['id_auteur'].'"'.'>'.'<input type="submit" value="M" />'.'</form>'.'</td>';
                echo '<td>'.'<form method="post" action="formSup.php">'.'<input type="hidden" name="identifiant" value="'.$ligne['id_auteur'].'"'.'>'.'<input type="submit" value="S" />'.'</form>'.'</td>';
                echo '</tr>';
            }
            echo '</table>';
            ?>
            <form method="post" action="formAjout.php">
                <p>
                <label>Ajouter un auteur</label></br>
                <input type="submit" value="Envoyer" />
                
                
                
                </p>
            </form>
        </body>
</html>
