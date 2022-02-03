<?php
session_start();
    include ("..\connexion\connexion.php");

        $id = $_GET["a"];

        $result="delete from article where id_article='$id'";
        if(mysqli_query($con,$result))
        {
            header("location:EspaceVendeur.php");
        }
        else 
        {
            header("location:EspaceVendeur.php?nosup=0");
        }

    
?>