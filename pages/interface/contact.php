<?php 
    session_start();
    $index="clients";
    $_SESSION['index']=$index;
    include("../../includes/header.php");
    if(isset($_SESSION['status'])){
        if($_SESSION['status']==false){
            header("LOCATION: ../../");
        } 
    }else{
        header("LOCATION: ../../");
    }

?>
<title>Gestion des clients</title>

<body onload="menuHeight()">

    <div class="ui grid stackable ">
        <?php 
            include("../../includes/menu.php");
        ?>
        <div class="ui height wide column grid"  style="margin-left:10px; max-width:600px">
            <center>
                <img src="../../images/workspace3_122057.png" class="ui image small" alt="">
            </center>
            <div class="ui green header">Contacter le client</div>
            <form action="#" class="ui form" method="post">

                <div class="ui field">
                    <div class="">Nom</div>
                    <div class="ui left icon input">
                        <i class="ui icon user"></i>
                        <input type="text" placeholder="Nom du client" name="nom" id="">
                    </div>
                </div>

                <div class="ui field">
                    <div class="ui top labeled">
                        <div class="">Message</div>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>


                <div class="ui field">
                    <center>
                        <button class="ui green button center aligned" style="witdh:100%">
                            <i class="ui send icon"></i>
                            Envoyer
                        </button>
                    </center>
                </div>
            
            </form>
        </div>
    <?php 
        include("../../includes/footer.php");
    ?>
    </div>

</body>