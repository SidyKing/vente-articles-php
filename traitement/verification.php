<?php
session_start();
if (isset($_POST["valider"]))
{
    include ("..\connexion\connexion.php");
	$log=$_POST['login'];
    $mdp=$_POST['password'];
    $profil=$_POST["profil"];

    $_SESSION['login']=$log;
    $_SESSION['password']=$mdp;
    $_SESSION['profil']=$profil;

    if (empty($log) || empty($mdp)) 
    {
		header("location:..\pages\identification.php?Monmessage=Veuillez remplir tous les champs !");
	}
    else 
    {
        if ($profil=="client")
        {
            $req1="select * from client where login='$log' and password='$mdp'";
            $result1=mysqli_query($con,$req1);
            $a= mysqli_num_rows($result1);
            if($a>=1)
            {
                header("location:..\EspaceClient\EspaceClient.php");
            }
            else
            {
                header("location:..\pages\identification.php?Monmessage=Login, mot de pass ou profil incorrect !");
            }
        }
        else if ($profil=="vendeur")
        {
            $req2="select * from vendeur where login='$log' and password='$mdp'";
            $result2=mysqli_query($con,$req2);
            $b= mysqli_num_rows($result2);
            if($b>=1)
            {
                header("location:..\EspaceVendeur\EspaceVendeur.php");
            }
            else
            {
                header("location:..\pages\identification.php?Monmessage=Login, mot de pass ou profil incorrect !");
            }
        }
	}
}

?>