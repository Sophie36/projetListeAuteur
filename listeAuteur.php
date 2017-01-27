<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
        <body>
            <form method="post" action="listeAuteur.php">
                <p>
                <label>Rechercher un auteur</label></br>
                <input type="text" name="nom" />
                <input type="submit" name="Rechercher" value="Rechercher" />
                </p>
            </form>
            <form method="post" action="listeAuteur.php">
                <p>
                    <label for="Trier">Trier</label></br>
                    <select name="choix" id="Choix">
                        <option value="1">Nom</option>
                        <option value="2">Prenom</option>
                        <option value="3">Date naissance</option>
                    </select>
                
                <input type="submit" name="trier" value="Trier" />
                </p>
            </form>
            <?php
            require_once 'include/infoConnexion.php';
            require_once 'include/connexion.php';
            require_once 'include/executeRequete.php';
            $cnx=connexion(UTILISATEUR,MOTDEPASSE,SERVER,BASEDEDONNEES);
            echo "<h2>Liste des Auteurs</h2>";
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
          
            $nbLignes=$idRequete->rowCount();
            echo '</br>Il y a '. $nbLignes .' auteurs.';
            
            if(isset($_POST['Rechercher'])){
              
               $nom=$_POST['nom'];
               $Sql = "SELECT auteur FROM nom WHERE nom  LIKE ?";
               $Sql->execute(array("%$_POST[nom]%"));
                $idRequete = executeRequete($cnx,$Sql,array($nom,$prenom,$date_naissance,$id_auteur));
               header('location:listeAuteur.php?');
            }
            
            ?>
            
            <form method="post" action="formAjout.php">
                <p>
                <label>Ajouter un auteur</label></br>
                <input type="submit" value="Envoyer" />
                </p>
            </form>
        </body>
</html>
