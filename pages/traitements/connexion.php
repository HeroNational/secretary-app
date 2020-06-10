<?php 
    session_start();
    include("../../includes/connexionBd.php");
    $_SESSION['status']==false;
    if($bdd){
        $login=!empty($_POST['login'])?$_POST['login']:'';
        $password=!empty($_POST['password'])?$_POST['password']:'';
        
        $sql="SELECT * FROM utilisateurs WHERE login like '$login' and password like '$password' limit 1";
        $resultset=$bdd->query($sql);
        while($resultat=$resultset->fetch()){
            $_SESSION["login"]=$resultat['login'];
            $_SESSION["password"]=$resultat['password'];
            $_SESSION["etat"]=$resultat['etat'];
            $_SESSION["role"]=$resultat['role'];
            $_SESSION['status']=true;
            header("LOCATION: ../interface/");
        }
    }
    $index=isset($_SESSION['redirected'])?$_SESSION['redirected']:'';
    if(!empty($index)){
        $_SESSION['redirected']='';
        header("Location: ../interface/".$index);
    }else{
        $_SESSION['status']==false?header("location: ../../"):'';
    }
?>