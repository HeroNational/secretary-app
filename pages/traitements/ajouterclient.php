<?php 

    include("../../includes/header.php"); 
    include("../../includes/connexionBd.php"); 
    include("../../includes/formatdate.php"); 

    $index="clients.php";
    $message="Vous n'avez pas rempli tous les champs du formulaire ";
    
        if(isset($_POST['nom']) and isset($_POST['phone']) and isset($_POST['email']) and isset($_POST['description'])){
        
            $nom=htmlspecialchars($_POST['nom']);
            $phone=htmlspecialchars($_POST['phone']);
            $email=htmlspecialchars($_POST['email']);
            $des=htmlspecialchars($_POST['description']);
            $image=$nom.$phone;

            if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {
                $infosfichier = pathinfo($_FILES['image']['name']);
                $infosfichier['extension']="jpg";
                $extension_image = $infosfichier['extension'];
                $extensions_permises = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_image, $extensions_permises)){
                    move_uploaded_file($_FILES['image']['tmp_name'], '../../images/clients/'.$image.'.'.$extension_image );
                }
            }
        if(!empty($_POST['nom']) and !empty($_POST['phone']) and !empty($_POST['email']) and !empty($_POST['description'])){

            $dat=formatsimpledate(date("o-m-d"), "fr"," ");
            $requete="INSERT INTO `client` (`idC`, `nomC`, `descriptionC`, `email`, `dateInsc`, `telephone`, `etat`) VALUES (NULL, '$nom', '$des', '$email', '$dat', '$phone', '1')";
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