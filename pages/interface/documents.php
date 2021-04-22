<?php 
    session_start();
    $index="documents";
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
<title>Gestion des documents</title>

<?php
    $exist=0;
    $requeteT="SELECT count(*) as count FROM document,client, secretaire WHERE document.proprietaire=client.idC and document.secretaire=secretaire.idS and document.etatD<3 GROUP BY idD";
    $executionT=$bdd->query($requeteT);
    while($resultatT=$executionT->fetch()){
        $exist=1;
    }
?>
<body style="overflow-y:<?php  echo $exist==0?"hidden":"" ?>"  onload="menuHeight()">

    <div class="ui grid stackable">
        <?php 
            include("../../includes/menu.php");
        ?>
        
        <div class="ui <?php  echo $exist==0?"fourteen":"eleven" ?> wide column grid" style="margin-left:0px;">
            <br>
            <?php 
                if($exist==1){
            ?>
            <div class="ui teal header">Tous les Documents</div>
            <div class="ui header">Trier par</div>
            <div class="ui large breadcrumb">
                <a href="?id=1" class="section
                        <?php 
                            $close="titre";
                            echo !isset($_GET['id'])?"active":'';
                            echo empty($_GET['id'])?"active":''; 
                            if(isset($_GET['id'])){ 
                                echo $_GET['id']==1?"active":'';
                                } 
                            ?>">
                    Noms
                </a>
                <div class="divider"> / </div>

                <a href="?id=2" class="section
                        <?php 
                            if(isset($_GET['id'])){ 
                                echo $_GET['id']==2?"active":'';
                                if($_GET['id']==2){
                                    $close="nomC";
                                }
                            } 
                        ?>">
                    Proprietaires
                </a>

                <div class="divider"> / </div>
                <a href="?&id=3" class="section
                            <?php 
                            if(isset($_GET['id'])){ 
                                echo $_GET['id']==3?"active":'';
                                if($_GET['id']==3){
                                        $close="nomS";
                                }
                                } 
                            ?>">
                    Clients
                </a>
                <div class="divider"> / </div>
                <a href="?&id=3" class="section
                            <?php 
                            if(isset($_GET['id'])){ 
                                echo $_GET['id']==3?"active":'';
                                if($_GET['id']==3){
                                        $close="etatD";
                                }
                                } 
                            ?>">
                    Etat
                </a>
            </div>
            <label for=""><a class="ui right corner red label"></a></label>
            <label for=""><a class="ui left corner red label"></a></label>
            <table class="ui teal celled striped table">
                <tr>
                    <th>Noms des documents</th>
                    <th>Proprietaires</th>
                    <th>Dates d'envoie</th>
                    <th>Delais</th>
                    <th>Prix</th>
                    <th>Secretaires en charge</th>
                    <th>Etats</th>
                    <th>Operations sur les fichiers</th>
                </tr>
                <tbody>
                    <?php
                        $requeteT="SELECT * FROM document,client, secretaire WHERE document.proprietaire=client.idC and document.secretaire=secretaire.idS and document.etatD<3 GROUP BY idD ORDER BY $close ASC";
                        if(isset($_GET['client'])){
                            $id=$_GET['client'];
                            $requeteT="SELECT * FROM document,client, secretaire WHERE document.proprietaire=client.idC and document.secretaire=secretaire.idS and document.etatD<3 and document.proprietaire=$id GROUP BY idD ORDER BY $close ASC";
                        }
                        $executionT=$bdd->query($requeteT);
                        while($resultatT=$executionT->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tr  id="line<?php echo $resultatT->idD; ?>">
                        <td><b><?php echo $resultatT->titre; ?></b></td>
                        <td>
                            <?php 
                                if($resultatT->etat==0){ 
                            ?>
                            <span class="ui red header">footoo</span>
                            <?php 
                                }else{
                                 echo $resultatT->nomC;
                                }
                            ?>
                        </td>
                        <td><?php echo $resultatT->dateDeb; ?></td>
                        <td><?php echo $resultatT->delai; ?></td>
                        <td><?php echo $resultatT->prix; ?> FCFA</td>
                        <td><?php echo $resultatT->nomS; ?></td>
                        <td>
                            <?php 
                            if($resultatT->etatD==0){
                        ?>
                            <span class="ui empty red circular label" title="Initial" style="float:right;"></span>
                            <?php
                            }else{
                                if($resultatT->etatD==1){
                        ?>
                            <span class="ui empty purple circular label" title="En cours de saisie"
                                style="float:right;"></span>
                            <?php
                                }else{
                        ?>
                            <span class="ui empty green circular label" title="Saisie terminee"
                                style="float:right;"></span>
                            <?php
                                }
                            }
                        ?>
                        </td>
                        <td>
                            <button title="Supprimer" onclickc="deldoc()"
                                onclick="deletefile(<?php echo $resultatT->idD; ?>)" class="ui red button"
                                style="margin:0px;width:24px;">
                                <i class="ui trash icon"></i>
                            </button>
                            <button title="Envoyer au proprietaire" class="ui teal button"
                                style="margin:0px;width:24px;">
                                <i class="ui send icon"></i>
                            </button>
                            <a href="updatefile.php?id=<?php echo $resultatT->idD; ?>" title="Modifier les informations"
                                class="ui blue button" style="margin:0px;width:24px;">
                                <i class="ui pencil icon"></i>
                            </a>
                            <a href="moreinfodocument.php?id=<?php echo $resultatT->idD; ?>"
                                title="Afficher plus d'informations" class="ui grey button"
                                style="margin:0px;width:24px;">
                                <i class="ui eye icon"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                    }
                    $executionT->closecursor();
                     ?>
                </tbody>
            </table>
            <br><br>
        </div>
        <?php } ?>
        <div class="ui <?php  echo $exist==0?"sixteen":"three" ?> wide column">
            <br><br>
            <div style="position:sticky; top:8px" class="ui container">
                    <?php 
                        
                        $requeteT="SELECT * FROM secretaire WHERE etatS !=0";
                        $executionTe=$bdd->query($requeteT);
                        $i=0;
                        $existS=0;
                        while($resultate=$executionTe->fetch(PDO::FETCH_OBJ)){
                            $existS=1;
                        }
                        $requeteT="SELECT * FROM client WHERE etat !=0";
                        $executionTe=$bdd->query($requeteT);
                        $i=0;
                        $existC=0;
                        while($resultate=$executionTe->fetch(PDO::FETCH_OBJ)){
                            $existC=1;
                        }
                        if($existC==1 and $existS==1 ){
                    ?>
                <div class="ui blue header">Nouveau document</div>
                <form action="../traitements/ajoutdocument.php" class="ui form" method="post">

                    <div class="ui field">
                        <div class="ui">Nom du document</div>
                        <div class="ui left icon input">
                            <i class="ui icon user"></i>
                            <input required type="text" placeholder="Nom du document" name="nom" id="">
                        </div>
                    </div>

                    <div class="ui field">
                        <div class="ui">Proprietaire</div>
                        <div class="ui top labeled">
                            <select name="proprietaire" id="">
                                <option value=""></option>
                                <?php
                                    $requete="SELECT * FROM client WHERE etat!=0 ORDER BY nomC ASC";
                                    $execution=$bdd->query($requete);
                                    while($resultat=$execution->fetch(PDO::FETCH_OBJ)){
                                        echo "
                                            <option value='$resultat->idC'>$resultat->nomC</option>
                                        ";
                                    }
                                    $execution->closecursor();
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="ui field">
                        <div class="ui">Delai</div>
                        <div class="ui left icon input">
                            <i class="ui icon calendar"></i>
                            <input required type="date" placeholder="Delai d'envoi du document" name="delai" id="">
                        </div>
                    </div>

                    <div class="ui field">
                        <div class="ui top labeled">
                            <div class="ui">Secretaire en charge du document</div>
                            <select name="secretaire" id="">
                                <option value=""></option>
                                <?php
                                    $requete="SELECT * FROM secretaire WHERE etatS like 1 ORDER BY nomS ASC";
                                    $execution=$bdd->query($requete);
                                    while($resultat=$execution->fetch(PDO::FETCH_OBJ)){
                                        echo "
                                            <option value='$resultat->idS'>$resultat->nomS</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="ui field">
                        <div class="ui top labeled">
                            <div class="ui">Coût de la saisie du document</div>
                            <input type="number" min="0" name="prix" id="">
                        </div>
                    </div>

                    <div class="ui field">
                        <div class="ui top labeled">
                            <div class="ui">Description du document</div>
                            <textarea name="description" id="" cols="30" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="ui field">
                        <center>
                            <button class="ui blue button center aligned" type="submit" style="witdh:100%">
                                <i class="ui check icon"></i>
                                Valider
                            </button>
                        </center>
                    </div>

                </form>
                <?php }else{
                    ?>
                    <h2 class="ui middle aligned center aligned header ">
                        <img src="../../images/404.png" style="width:200px;" class="image">
                        <br>
                        <br>
                            <?php
                                if($existS==0 and $existC==1){
                                    ?>
                                    <center>
                                        <div style="max-width:400px">
                                            Inscrivez une nouvelle secretaire avant de continuer en cliquant sur le <a href="users.php?" class="ui content teal">boutton ci-dessous.</a>
                                            <br>
                                            <br>
                                            <a href="users.php?" class="ui button teal">Nouvelle secretaire</a>
                                        </div> 
                                    </center>
                                    <?php
                                }else{
                                    if($existS==1 and $existC==0){
                                    ?>
                                    <center>
                                        <div style="max-width:400px">
                                            Inscrivez un nouveau client avant de continuer en cliquant sur le <a href="users.php?" class="ui content teal">boutton ci-dessous.</a>
                                            <br>
                                            <br>
                                            <a href="clients.php?" class="ui button teal">Nouveau client</a>
                                        </div> 
                                    </center>
                                    <?php
                                    }else{
                                        ?>
                                        <center>
                                            <div style="max-width:400px">
                                                Inscrivez une nouvelle secretaire et un nouveau client avant de continuer en cliquant sur les boutton ci-dessous.
                                                <br>
                                                <br>
                                                <a href="clients.php?" class="ui button teal">Nouveau client</a>&nbsp;&nbsp;<a href="users.php?" class="ui button blue">Nouvelle secretaire</a>
                                            </div> 
                                        </center>
                                        <?php
                                    }
                                } 
                            ?>
                    </h2>
                    <?php 
                } ?>
            </div>
        </div>
    </div>

    <?php 
        include("../../includes/footer.php");
    ?>

    </div>

</body>

</html>