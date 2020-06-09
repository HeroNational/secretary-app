<?php 
    $id=$_GET['id'];
    include("../../includes/connexionBd.php");
    $requete="UPDATE `secretaire` set `etatS`='0' WHERE idS like '$id'";
    $bdd->query($requete);
?>