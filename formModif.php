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
            
            //récupération des valeurs des champs:
  //nom:
  $nom = $_POST["nom"] ;
  //prenom:
  $prenom = $_POST["prenom"] ;
  //date_naissance:
  $adresse = $_POST["date_naissance"] ;
  
  //récupération de l'identifiant de la personne:
  $id_auteur=$_POST['identifiant'];
 
 //exécution de la requête SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  {
    echo("La modification à été correctement effectuée") ;
  }
  else
  {
    echo("La modification à échouée") ;
  }


            
            
            ?>
            

        </body>
</html>