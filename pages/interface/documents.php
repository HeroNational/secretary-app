<?php 
    session_start();
    $index="documents";
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
<title>Gestion des documents</title>

<body onload="clickl()">

    <div class="ui grid stackable">
        <?php 
            include("../../includes/menu.php");
        ?>
        <div class="ui eleven wide column grid"  style="margin-left:0px;">
        <br>
            <div class="ui blue header">Tous les Documents</div>
            <table class="ui teal celled striped table">
                <label for=""><a class="ui right corner red label"></a></label>
                <label for=""><a class="ui left corner red label"></a></label>
                <thead>
                    <tr>
                        <th>Noms des documents</th>
                        <th>Proprietaires</th>
                        <th>Dates d'envoie</th>
                        <th>Delais</th>
                        <th>Secretaires en charge</th>
                        <th>Etats</th>
                        <th>Operations sur les fichiers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fiche de divaorce</td>
                        <td>Daniel</td>
                        <td>20 mars 2020</td>
                        <td>25 juin 2020</td>
                        <td>Manga</td>
                        <td>
                            <span class="ui empty purple circular label" title="En cours" style="float:right;"></span>
                        </td>
                        <td>
                            <button title="Supprimer"  onclick="del()"class="ui red button"   style="margin:0px;width:24px;">
                                <i class="ui trash icon"></i>
                            </button>
                            <button title="Envoyer au proprietaire" class="ui teal button"  style="margin:0px;width:24px;">
                                <i class="ui send icon"></i>
                            </button>
                            <a href="updatefile.php" title="Modifier les informations" class="ui blue button"  style="margin:0px;width:24px;">
                                <i class="ui pencil icon"></i>
                            </a>
                            <a href="moreinfodocument.php" title="Afficher plus d'informations" class="ui grey button"  style="margin:0px;width:24px;">
                                <i class="ui eye icon"></i>
                            </a>
                        </td>
                    </tr>
                    <?php for($i=0;$i<20;$i++){ ?>
                    <tr>
                        <td>Fiche de divaorce</td>
                        <td>Daniel</td>
                        <td>20 mars 2020</td>
                        <td>25 juin 2020</td>
                        <td>Manga</td>
                        <td>
                             <span class="ui empty green circular label" title="Termine" style="float:right;"></span>
                        </td>
                        <td>
                            <a href="updatefile.php" title="Supprimer"  onclick="del()"class="ui red button"   style="margin:0px;width:24px;">
                                <i class="ui trash icon"></i>
                            </a>
                            <a href="updatefile.php" title="Envoyer au proprietaire" class="ui teal button"   style="margin:0px;width:24px;">
                                <i class="ui send icon"></i>
                            </a>
                            <a href="updatefile.php" title="Modifier les informations" class="ui blue button"  style="margin:0px;width:24px;">
                                <i class="ui pencil icon"></i>
                            </a>
                           
                            <a href="moreinfodocument.php" title="Afficher plus d'informations" class="ui grey button"  style="margin:0px;width:24px;">
                                <i class="ui eye icon"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Fiche de divaorce</td>
                        <td>Daniel</td>
                        <td>20 mars 2020</td>
                        <td>25 juin 2020</td>
                        <td>Manga</td>
                        <td>
                            <span class="ui empty red circular label" title="Initial" style="float:right;"></span>
                        </td>
                        <td>
                            <button title="Supprimer"  onclick="del()"class="ui red button"   style="margin:0px;width:24px;">
                                <i class="ui trash icon"></i>
                            </button>
                            <button title="Envoyer au proprietaire" class="ui teal button" style="margin:0px;width:24px;">
                                <i class="ui send icon"></i>
                            </button>
                            <a href="updatefile.php" title="Modifier les informations" class="ui blue button"  style="margin:0px;width:24px;">
                                <i class="ui pencil icon"></i>
                            </a>
                           
                            <a href="moreinfodocument.php" title="Afficher plus d'informations" class="ui grey button"  style="margin:0px;width:24px;">
                                <i class="ui eye icon"></i>
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <br><br>
        </div> 
        <div class="ui three wide column">
            <br><br>
            <div  style="position:sticky; top:8px" class="ui container">

                <div class="ui blue header">Nouveau document</div>
                <form action="#" class="ui form" method="post">

                    <div class="ui field">
                        <div class="ui">Nom du document</div>
                        <div class="ui left icon input">
                            <i class="ui icon user"></i>
                            <input type="text" placeholder="Nom du document" name="nom" id="">
                        </div>
                    </div>

                    <div class="ui field">
                        <div class="ui">Proprietaire</div>
                        <div class="ui left icon input">
                            <i class="ui icon weixin"></i>
                            <input type="text" placeholder="Nom du proprietaire" name="phone" id="">
                        </div>
                    </div>

                    <div class="ui field">
                        <div class="ui">Delai</div>
                        <div class="ui left icon input">
                            <i class="ui icon calendar"></i>
                            <input type="date" placeholder="Delai d'envoi du document" name="phone" id="">
                        </div>
                    </div>

                    <div class="ui field">
                        <div class="ui top labeled">
                            <div class="ui">Secretaire en charge du document</div>
                            <select name="" id="">
                                <option value="#">Manga</option>
                                <option value="#">Mbarga</option>
                                <option value="#">Olinga</option>
                            </select>
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
    <?php 
        include("../../includes/footer.php");
    ?>
    </div>

</body>
</html>