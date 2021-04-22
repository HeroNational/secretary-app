<?php 

    include("../../includes/header.php"); 
    include("../../includes/connexionBd.php"); 
    include("../../includes/formatdate.php"); 

    $index="documents.php";
    $message="Vous n'avez pas rempli tous les champs du formulaire ";
    if(isset($_POST['nom']) and isset($_POST['proprietaire']) and isset($_POST['delai']) and isset($_POST['secretaire']) and isset($_POST['description'])){
        
        $nom=htmlspecialchars($_POST['nom']);
        $pro=htmlspecialchars($_POST['proprietaire']);
        $del=htmlspecialchars($_POST['delai']);
        $sec=htmlspecialchars($_POST['secretaire']);
        $des=htmlspecialchars($_POST['description']);
        $prix=htmlspecialchars($_POST['prix']);

        if(!empty($_POST['nom']) and !empty($_POST['proprietaire']) and !empty($_POST['delai']) and !empty($_POST['secretaire']) and !empty($_POST['description'])){
            $del=formatsimpledate($del, "fr"," ");
            $dat=formatsimpledate(date("o-m-d"), "fr"," ");
            $requete="INSERT INTO `document` (`idD`, `titre`, `dateDeb`, `delai`, `description`, `secretaire`, `etatD`, `proprietaire`,`prix`) VALUES (NULL, '$nom', '$dat', '$del', '$des', '$sec', '0', '$pro','$prix');";
            if($bdd->query($requete)){
                header("Location: ../interface/".$index);
            }else{
                $message="Oups... Vous avez bien rempli les champs du formulaire mais l'enregistrement ne s'est pas terminee";
            }
        }
    }else{
        $message="Quelque chose n'a pas marche correctement";
    }
?>
<title>Gestion des documents</title>

<body onload="menuHeight()">

    <div class="ui grid stackable">
        <div class="ui row">
            <?php 
                //include("../../includes/menu.php");
            ?>

            <div class="ui thirteen wide column center aligned" style="margin-top: 100px;">
                <h2 class="ui red image header">
                    <?php echo $message ?>.<span class="greating"></span>
                    <br>
                    <br>
                </h2>
                <div class="content">Specifier votre choix en cliquant sur l'un des deux boutons ci-dessous</div>
                <div class="ui two column stackable center aligned grid segment">
                    <div class="column">
                        <a href="javascript:history.go(-1)" class="ui button green">Remplir ce champ</a>
                    </div>
                    <div class="ui vertical divider">ou</div>
                    <div class="column">
                        <a href="../interface/documents.php" class="red ui button ">Reinitialiser le formulaire</a>
                    </div>
                </div>
            </div>
            <?php 
                    //include("../../includes/footer.php");
            ?>
        </div>
    </div>

</body>
</html>