<?php
session_start();
include ("..\connexion\connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EspaceVendeur</title>
</head>
<body>
    <form method="post" action="..\traitement\traitement.php">
        <?php 
            $req="select id_article,libelle,date_sortie from article";
            if($result=mysqli_query($con,$req))
            {
                echo "<table>";
                echo "<tr><td>";
                echo "id_article";
                echo "</td><td>----</td><td>";
                echo "nom_article";
                echo "</td><td>----</td><td>";
                echo "date_sortie";
                echo "</tr>";
                while($row=mysqli_fetch_row($result))
                {
                    echo "<tr><td>";
                    echo $row[0];
                    echo "</td><td>----</td><td>";
                    echo $row[1];
                    echo "</td><td>----</td><td>";
                    echo $row[2];
                    echo "</td><td>----</td><td>";
                    echo "<a href ='modification.php?a=$row[0]'>Modifier</a>";
                    echo "</td><td>----</td><td>";
                    echo "<a href ='supprimer.php?a=$row[0]'>Supprimer</a>";
                    echo "</td></tr>";
                }
                echo "</table><br/><br/>";
            }
            else
            {
              echo "aucun enregistrement";
            }
        ?>
    </form>
    <button onclick="window.location.href ='ajout.php';">Ajouter articles</button>
    <button onclick="window.location.href ='../connexion/deconnexion.php';">Deconnexion</button>
</body>
</html>

<?php
if(isset($_GET["Monmessage"]))
{
	$vide=$_GET["Monmessage"];
	echo '<font color="red" size="4px">'.$vide.'</font>';
}
if(isset($_GET["nosup"]))
{
	$vide=$_GET["nosup"];
	echo '<font color="red" size="4px">'.$vide.'</font>';
}
?>