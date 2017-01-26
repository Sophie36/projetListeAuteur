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
            echo "<h2>Formulaire de modification</h2>";
            if(isset($_POST['identifiant'])){
            $id_auteur=$_POST['identifiant'];
            $varSql = "SELECT id_auteur,nom,prenom,date_naissance FROM auteur WHERE id_auteur= ?";
            $idRequete = executeRequete($cnx,$varSql,array($id_auteur));
            
            echo '<table>';
            
            while($ligne=$idRequete->fetch()){
            ?>
            <form method='POST'action="formSup.php">
            
            <p>Identifiant:<br/>
                <input name="id_auteur" size="22" value="<?php echo ''.$ligne["id_auteur"].'';?>" type="text" readonly/></br>
            </p>
            
            <p>Nom:<br/>
             <input name="nom" size="22" value="<?php echo ''.$ligne["nom"].'';?>" type="text"/>
            </p>

            <p>Prénom:<br/>
             <input name="prenom" size="22" value="<?php echo ''.$ligne["prenom"].'';?>" type="text"/>
            </p> 

           <p>Date de naissance:<br/>
            <input name="date_naissance" size="22" value="<?php echo ''.$ligne["date_naissance"].'';?>" type="text"/>
           </p>

            <input name="Effacer" value="Supprimer" type="submit"/>
            <input name="Retour" value="Retour" type="submit"/>

            </form>
            
            <?php
            //On ferme la boucle while
             }
            //On ferme le if
            }
            if(isset($_POST['Retour'])){
                header('location:listeAuteur.php?');
            }
            if(isset($_POST['Effacer'])){
               $id_auteur=$_POST['id_auteur'];
               $Sql = "DELETE FROM auteur WHERE id_auteur=?";
               $idRequete = executeRequete($cnx,$Sql,array($id_auteur));
               header('location:listeAuteur.php?');
            }
            
            ?>
        </body>
</html>
