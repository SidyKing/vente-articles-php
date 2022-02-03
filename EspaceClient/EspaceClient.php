<?php
session_start();
include ("..\connexion\connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EspaceClient</title>
</head>
<body>
    <form method="post" action="..\traitement\traitement.php">
        <?php 
            $req="select id_article,libelle,date_sortie from article";
            if($result=mysqli_query($con,$req))
            {
                echo "<table border='1'>";
                echo "<tr><td>";
                echo "choix";
                echo "</td><td>";
                echo "id_article";
                echo "</td><td>";
                echo "nom_article";
                echo "</td><td>";
                echo "date_sortie";
                echo "</tr>";
                while($row=mysqli_fetch_row($result))
                {
                    echo "<tr><td>";
                    echo"<input type='checkbox' name='choix[]' value='$row[1]' /><label for='choix'>";
                    echo "</td><td>";
                    echo $row[0];
                    echo "</td><td>";
                    echo $row[1];
                    echo "</td><td>";
                    echo $row[2];
                    echo "</td>";
                    echo "</label>";
                    echo "</tr>";
                }
                echo "</table><br/><br/>";
            }
            else
            {
              echo "aucun enregistrement";
            }
        ?>
        <input type="submit" name="acheter" value="acheter"></br></br>
    </form>
    <button onclick="window.location.href ='../connexion/deconnexion.php';">Deconnexion</button>
</body>
</html>

<?php
if(isset($_GET["Monmessage"]))
{
	$vide=$_GET["Monmessage"];
	echo '<font color="red" size="4px">'.$vide.'</font>';
}
?>