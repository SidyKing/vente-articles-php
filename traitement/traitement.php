<?php
session_start();
include ("..\connexion\connexion.php");
$log=$_SESSION['login'];
    $mdp=$_SESSION['password'];
    $profil=$_SESSION['profil'];

if(isset($_POST["acheter"]))
{
    if(isset($_POST["choix"]))
    {
            $choix="";
        foreach($_POST["choix"] as $val)
        {
            $choix .= $val."--";
        }

        $req1="select nom_client,prenoms_client,email_client from client where login='$log' and password='$mdp'";
        $result1=mysqli_query($con,$req1);
        while($row=mysqli_fetch_row($result1))
        {
            $nom=$row[0];
            $prenoms=$row[1];
            $email=$row[2];
        }

        $dest = $email;
        $name = "TEAM ETHICAL HACKERS";
        $sujet = "Achat d'articles";
        $message = "Vous avez choisie les articles suivants : $choix";
        $corp = "
                    Vous avez recu un message
                        Nom :".$name." 
                        Mail :".$email." 
                        Objet :".$sujet." 
                        
                        ".nl2br($message)."
                ";

        $headers = "From: ".$email;

           if(mail($dest, $sujet,$corp, $headers))
           {
                header("location:..\EspaceClient\EspaceClient.php?Monmessage=Vos choix ont ete pris en compte, veuillez aller consulter vos emails");
           }
           else
           {
                header("location:..\EspaceClient\EspaceClient.php?Echec mail");
           }
    }
    else
    {
        header("location:..\EspaceClient\EspaceClient.php?Monmessage=Veuillez faire un choix!!!");
    }

}

?>