<?php 
    $id=$_GET['id'];
    include("../../includes/connexionBd.php");
    $requete="UPDATE `client` set `etat`='0' WHERE `client`.`idC` like '$id'";
    $bdd->query($requete);
?>