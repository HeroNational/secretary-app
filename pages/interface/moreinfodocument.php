<?php 
    session_start();
    $index="documents";
    $_SESSION['index']=$index;
    include("../../includes/header.php");
    if(isset($_SESSION['status'])){
        if($_SESSION['status']==false){
            header("LOCATION: ../../");
        } 
    }else{
        header("LOCATION: ../../");
    }

    $id=isset($_GET['id'])?$_GET['id']:header("Location: ".$index.".php");
    $requeteT="SELECT * FROM document WHERE document.idD like $id";
    $executionTe=$bdd->query($requeteT);
    $i=0;
    while($resultate=$executionTe->fetch(PDO::FETCH_OBJ)){
        $i=1;
    }

    $i!=1?header("Location: ".$index.".php"):"";
?>
<title>Gestion des documents</title>

<body onload="menuHeight()">

    <div class="ui grid stackable">
        <div class="ui row">
            <?php 
                include("../../includes/menu.php");
            ?>
                <div class="ui container ten wide column" style="padding-top:30px;padding-bottom:200px;">

                    <h1 class="ui header teal">Informations sur le document</h1>

                    <div class="ui segments stackable piled">
                        <?php 
                            $requeteT="SELECT * FROM document,client, secretaire WHERE document.proprietaire=client.idC and document.secretaire=secretaire.idS and document.idD like $id GROUP BY idD ORDER BY titre ASC";
                            $executionT=$bdd->query($requeteT);
                            while($resultat=$executionT->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Nom du document:
                                </div>
                                <div class="ui message">
                                    <?php echo $resultat->titre; ?>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Proprietaire:
                                </div>
                                <div class="ui message">
                                    <?php echo $resultat->nomC; ?>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Date d'enregistrement:
                                </div>
                                <div class="ui message">
                                    <?php echo $resultat->dateDeb; ?>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Delai:
                                </div>
                                <div class="ui message">
                                    <?php echo $resultat->delai; ?>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Secretaire en charge:
                                </div>
                                <div class="ui message">
                                    <?php echo $resultat->nomS; ?>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Etat:
                                </div>
                                <div class="ui message">
                                <?php 
                                    if($resultat->etatD==0){
                                ?>
                                        Initial<span class="ui empty red circular label" title="Initial"style="position:absolute; right:20px;"></span>
                                <?php
                                    }else{
                                        if($resultat->etatD==1){
                                ?>
                                        En cours de saisie<span class="ui empty purple circular label" title="En cours de saisie"style="position:absolute; right:20px;"></span>
                                <?php
                                        }else{
                                ?>
                                        Saisie terminee<span class="ui empty green circular label" title="En cours de saisie"style="position:absolute; right:20px;"></span>
                                <?php
                                        }
                                    }
                                ?>
                                </td>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Description:
                                </div>
                                <div class="ui message">
                                    <?php echo $resultat->description; ?>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Operations:
                                </div>
                                <div class="ui message">

                                    <center>
                                        <button title="Supprimer"  onclick="deletefile(<?php echo $resultat->idD; ?>)" class="ui red button"   style="margin:0px;width:24px;">
                                            <i class="ui trash icon"></i>
                                        </button>
                                        <button title="Envoyer au proprietaire" class="ui teal button" style="margin:0px;width:24px;">
                                            <i class="ui send icon"></i>
                                        </button>
                                        <a href="updatefile.php?id=<?php echo $resultat->idD; ?>" title="Modifier les informations" class="ui blue button"  style="margin:0px;width:24px;">
                                            <i class="ui pencil icon"></i>
                                        </a>
                                    </center>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            <?php 
                    include("../../includes/footer.php");
            ?>
        </div>
    </div>

</body>
</html>