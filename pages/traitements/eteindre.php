<?php 
    session_start();
    $index=$_SESSION['index'];
    session_destroy();

    session_start();

    $_SESSION['message']="Disconnected";
    $_SESSION['redirected']=$index.'.php';

    system("shutdown -h");
?>