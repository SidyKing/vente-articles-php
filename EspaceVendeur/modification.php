<?php 
session_start();

if(isset($_POST["maj"]))
{
    include ("..\connexion\connexion.php");

$id = $_GET["a"];
$libelle = $_POST["libelle"];
$date_sortie = $_POST["datesortie"];

$result = "update article set libelle='$libelle',date_sortie='$date_sortie' where article.id_article='$id'";

if(mysqli_query($con,$result))
{
    header("location:EspaceVendeur.php");
}
else
{
    $show= "echec de la modification";
}
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MISE A JOUR ARTICLE</title>
</head>
<body>
    <form method="POST" action="">
    nouveau libelle <input type="text" name="libelle"></br>
    nouvelle date de sortie <input type="date" name="datesortie"></br>
    <input type="submit" name="maj" value="modifier">

    </form>
</body>
</html>
<?php
if (isset($show))
{
        echo '<font color="red" size="4px">'.$show.'</font>';
}
?>