<?php 
    session_start();
    $index="clients";
    $_SESSION['index']=$index;
    if(isset($_SESSION['status'])){
        if($_SESSION['status']==false){
            header("LOCATION: ../../");
        } 
    }else{
        header("LOCATION: ../../");
    }
    include("../../includes/header.php");

?>
<title>Gestion des clients</title>

<body onload="menuHeight()" onresize="menuHeight()">

    <div class="ui grid stackable">
        <?php 
            include("../../includes/menu.php");
        ?>
        <div class="ui fourteen wide column grid" style="margin-left:10px;padding-bottom:100px">
            <div class="ui thirteen wide column grid">

                <?php 
                    $requeteT="SELECT * FROM client WHERE etat !=0";
                    $executionTe=$bdd->query($requeteT);
                    $i=0;
                    $exist=0;
                    while($resultate=$executionTe->fetch(PDO::FETCH_OBJ)){
                        $exist=1;
                    }
                ?>
                <?php 
                if($exist==1){
                ?>
                <div class="ui teal header">Tous les clients</div>
                <?php
                        
                    $requeteT="SELECT * FROM client WHERE etat !=0";
                    $executionTe=$bdd->query($requeteT);
                    $i=0;
                    while($resultate=$executionTe->fetch(PDO::FETCH_OBJ)){
                    
                    ?>
                <div class="ui five wide column card left floated" id="line<?php echo $resultate->idC; ?>"
                    style="margin-left:0px;">
                    <div class="image">
                        <img
                            src="../../images/clients/<?php echo file_exists("../../images/clients/".$resultate->nomC.$resultate->telephone.".jpg")?$resultate->nomC.$resultate->telephone.".jpg":"defaut.jpg"; ?>">
                    </div>
                    <div class="content">
                        <div class="header"><?php echo $resultate->nomC; ?></div>
                        <div class="meta">
                            <a href="mailto: <?php echo $resultate->email; ?>"
                                class="group"><?php echo $resultate->email; ?></a>
                            <br>
                            <a href="tel: <?php echo $resultate->telephone; ?>"
                                class="group"><?php echo $resultate->telephone; ?></a>
                        </div>
                        <div class="description">
                            <?php echo $resultate->descriptionC; ?>
                        </div>
                    </div>

                    <div class="ui two column stackable center aligned grid message">
                        <a href="#" class="ui button red" title="Supprimer" onclick="deleteclient(<?php echo $resultate->idC; ?>)">
                            <i class="ui trash icon"></i>
                        </a>
                        <a href="mailto: <?php echo $resultate->email; ?>" title="Envoyer un mail" class="ui button teal">
                            <i class="ui talk icon white"></i>
                        </a>
                        <a href="tel: <?php echo $resultate->telephone; ?>" tilte='Appeler' class="ui button blue">
                            <i class="ui phone icon white"></i>
                        </a>
                        <a href="./documents.php?client=<?php echo $resultate->idC; ?>" title="Afficher ses documents" class="ui button green">
                            <i class="ui  book icon white"></i>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
            <div class="ui <?php  echo $exist==0?"sixteen":"three" ?> wide column">
                <br><br>
                <div style="position:sticky; top:8px" class="ui container">

                    <div class="ui teal header">Nouveau client</div>
                    <form action="../traitements/ajouterclient.php" class="ui form" enctype="multipart/form-data"
                        method="post">

                        <div class="ui field">
                            <div class="">Nom</div>
                            <div class="ui left icon input">
                                <i class="ui icon user"></i>
                                <input required type="text" placeholder="Nom du client" name="nom" id="">
                            </div>
                        </div>

                        <div class="ui field">
                            <div class="">Telephone</div>
                            <div class="ui left icon input">
                                <i class="ui icon weixin"></i>
                                <input required type="number" placeholder="Numero de telephone " name="phone" id="">
                            </div>
                        </div>

                        <div class="ui field">
                            <div class="">Email</div>
                            <div class="ui left icon input">
                                <i class="ui icon mail"></i>
                                <input required type="email" placeholder="Adresse email" name="email" id="">
                            </div>
                        </div>

                        <div class="ui field">
                            <label for="file" class="ui teal button "><i class="ui icon picture"></i> Photo du
                                client</label>
                            <input required type="file" style="display:none" name="image" accept="image/*" id="file">
                        </div>

                        <div class="ui field">
                            <div class="ui top labeled">
                                <div class="">Description</div>
                                <textarea name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>


                        <div class="ui field">
                            <center>
                                <button class="ui blue button center aligned" style="witdh:100%">
                                    <i class="ui check icon"></i>
                                    Valider
                                </button>
                            </center>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php 
        include("../../includes/footer.php");
    ?>
    </div>

</body>

</html>