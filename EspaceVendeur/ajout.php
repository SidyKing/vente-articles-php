<?php
session_start();

if (isset($_POST["ajouter"]))
{
    if(!empty($_POST["libelle"])  and !empty($_POST["datesortie"]))
    {
        include ("..\connexion\connexion.php");
        $libelle = $_POST["libelle"];
        $date_sortie = $_POST["datesortie"];

        $req1="insert into article(libelle,date_sortie) values('".$libelle."','".$date_sortie."')";

        if(mysqli_query($con,$req1))
        {
            header("location:EspaceVendeur.php");
        }
        else
        {
            echo "echec de l'enregistrement";
        }
    }
    else 
    {
        $show= "Veuillez remplir tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AJOUT ARTICLE</title>
</head>
<body>
    <form method="POST" action="">
    libelle <input type="text" name="libelle"></br>
    date de sortie <input type="date" name="datesortie"></br>
    <input type="submit" name="ajouter" value="Ajouter">

    </form>
</body>
</html>
<?php
if (isset($show))
{
        echo '<font color="red" size="4px">'.$show.'</font>';
}
?>