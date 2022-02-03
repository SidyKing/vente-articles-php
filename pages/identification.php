<?php
session_start();
 setcookie('authentification','Veuillez-vous authentifier!',time()+3600*24*31);
 echo "</br>";
 echo "&nbsp&nbsp";echo $_COOKIE["authentification"];echo "</br></br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IDENTIFICATION</title>
</head>
<body>
    <form method="post" action="..\traitement\verification.php">
        <table>
            <tr>
                <td>Login</td><td><input type="text" name="login"/> </td>
            </tr>
            <tr>
                <td>Mot de Passe</td><td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td>Client</td><td><input type="radio" name="profil" value="client" checked="checked" /></td>
                <td>Vendeur</td><td><input type="radio" name="profil" value="vendeur" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="valider" value="Connexion"/></td>
            </tr>
        </table>    
    </form>
</body>
</html>

<?php
if(isset($_GET["Monmessage"]))
{
	$vide=$_GET["Monmessage"];
	echo '<font color="red" size="4px">'.$vide.'</font>';
}
?>