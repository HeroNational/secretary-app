<?php 
    session_start();
    $index="index";
    $_SESSION['index']=$index;
    include("../../includes/header.php");
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=false){
            header("LOCATION: ../../");
        } 
    }else{
        header("LOCATION: ../../");
    }

?>

<body onload="clickl()">

    <div class="ui grid stackable">
        <div class="ui row">
            <?php 
                include("../../includes/menu.php");
            ?>

            <div class="ui thirteen wide column center aligned" style="margin-top: 100px;">
                <h2 class="ui blue image header">
                    Bienvenue <span class="greating"><?php echo $_SESSION['login'] ?></span>
                    <br>
                    <br>
                    <img src="../../images/workspace1_122059.png" style="width:200px;" class="image">
                </h2>
                <div class="content">Specifier votre choix en cliquant sur l'un des deux boutons ci-dessous</div>
                <div class="ui two column stackable center aligned grid segment">
                    <div class="column">
                        <a href="documents.php" class="ui button blue">Gerer les documents</a>
                    </div>
                    <div class="ui vertical divider">ou</div>
                    <div class="column">
                        <a href="clients.php" class="teal ui button ">Gerer les clients</a>
                    </div>
                </div>
            </div>
            <?php 
                    include("../../includes/footer.php");
            ?>
        </div>
    </div>

</body>
</html>