<?php
    $host="localhost";
    $user="root";
    $pass="";
    $base="gestion_ventes";

    $con= mysqli_connect($host,$user,$pass,$base)
       or die("erreur de connexion".mysqli_connect_errno($con));
?>