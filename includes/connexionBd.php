<link rel="stylesheet" href="../../secretary-app/css/distM/semantic.css">
<?php
    try{
        $bdd=new PDO("mysql:host=localhost;dbname=pureapp;","root","");
    }catch(PDOException $e){
        $a=$e->getMessage();
        $a=explode("SQLSTATE[HY000] [1049] Unknown database",$e);
        if($a[0]="SQLSTATE[HY000] [1049] Unknown database'"){
            /* system("cd  ../../");
            system("cd  ../../base_de_donnees/");
            system("mysql pureapp.sql"); */
            echo "<br><br><br><center style='position:relative; transform:translateX(-50%);transform:translateY(-50%); top:40%; font-size:25px;' ><i class='ui icon database' style='font-size:70px; color:red'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Base de donnees inconnue. ";
            echo "</center>";
        }
        die;
    }
?>