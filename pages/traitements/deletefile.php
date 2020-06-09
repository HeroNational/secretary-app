<?php 
    $id=$_GET['id'];
    include("../../includes/connexionBd.php");
    $requete="UPDATE `document` set `etatD`='4' WHERE `document`.`idD` like '$id'";

    $bdd->query($requete);
?>