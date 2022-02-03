<?php
if(isset($_POST["inscription"]))
{
    include ("..\connexion\connexion.php");
    if(isset($_POST["profil"]) and !empty($_POST["nom"]) and !empty($_POST["prenoms"]) and !empty($_POST["adresse"]) and !empty($_POST["tel"]) and !empty($_POST["email"]) and !empty($_POST["login"]) and !empty($_POST["password"]))
    {
        $req1="select email from admin where login='root' and password='root'";
        $result1=mysqli_query($con,$req1);
        while($row=mysqli_fetch_row($result1))
        {
            $email=$row[0];
        }

            $nom=$_POST["nom"];
            $prenoms=$_POST["prenoms"];
            $adresse=$_POST["adresse"];
            $tel=$_POST["tel"];
            $mail=$_POST["email"];
            $login=$_POST["login"];
            $password=$_POST["password"];
            $profil=$_POST["profil"];
        

        $dest = $email;
        $name = "TEAM ETHICAL HACKERS";
        $sujet = "Demande d'inscription";
        $message = "profil: $profil
                    nom: $nom
                    prenoms: $prenoms
                    login: $login
                    password: $password
                    adresse: $adresse
                    email: $mail
                    tel: $tel";
        $corp = "
        Vous avez un nouvelle demande d'inscription
                        Nom :".$name." 
                        Mail :".$email." 
                        Objet :".$sujet." 
                        
                        ".($message)."
                ";

        $headers = "From: ".$email;

           if(mail($dest, $sujet,$corp, $headers))
           {
                $sortie = "Demande d'inscription pris en compte, vous recevrez un email de confirmation dans les 24h ";
           }
           else
           {
                $sortie = "Echec de l'envoi des donnees a l'admin";
           }
    }
    else
    {
        $sortie = "Veuillez remplir tous les champs";
    }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>INSCRIPTION</title>
</head>
<body>
<form method="post" action="">
        <table>
            <tr>
                <td>Nom</td><td><input type="text" name="nom"/> </td>
            </tr>
            <tr>
                <td>Prenoms</td><td><input type="text" name="prenoms"/> </td>
            </tr>
            <tr>
                <td>Adresse</td><td><input type="text" name="adresse"/> </td>
            </tr>
            <tr>
                <td>Telephone</td><td><input type="text" name="tel"/> </td>
            </tr>
            <tr>
                <td>Email</td><td><input type="text" name="email"/> </td>
            </tr>
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
                <td colspan="2"><input type="submit" name="inscription" value="Inscription"/></td>
            </tr>
        </table>    
    </form>
</body>
</html>
<?php
if(isset($sortie))
{
	echo '<font color="red" size="4px">'.$sortie.'</font>';
}
?>