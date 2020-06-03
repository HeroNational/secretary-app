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
        <div class="ui row">
            <?php 
                include("../../includes/menu.php");
            ?>
                <div class="ui container ten wide column" style="padding-top:30px;padding-bottom:200px;">

                    <h1 class="ui header teal">Informations sur le document</h1>

                    <div class="ui segments stackable piled">

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Nom du document:
                                </div>
                                <div class="ui message">
                                    Facere, enim sapiente
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Proprietaire:
                                </div>
                                <div class="ui message">
                                    Daniel
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Date d'enregistrement:
                                </div>
                                <div class="ui message">
                                    16 juin 2020
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Delai:
                                </div>
                                <div class="ui message">
                                    20 mars 2020
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Secretaire en charge:
                                </div>
                                <div class="ui message">
                                    Manga
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Etat:
                                </div>
                                <div class="ui message">
                                    En cours <span class="ui empty circular label teal" style="position:absolute; right:20px;" title="En cours"></span>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <div class="ui content">
                                <div class="ui top red ribbon label">
                                    Description:
                                </div>
                                <div class="ui message">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero, ad autem neque ipsum odit reprehenderit aut quaerat aliquam deleniti commodi fugiat quia omnis veritatis, illum earum maiores voluptate voluptatum eum!
                                    Voluptate similique ipsa quo voluptates consequatur corrupti ratione quis suscipit tempora aliquid odit voluptatem, perferendis, id tenetur. Similique quis ipsa hic quos veniam, inventore dicta molestiae earum placeat quia aut.
                                    Maxime neque accusamus, aut qui autem, accusantium mollitia atque ullam nulla id quo. Ratione, dolorum nam! Dolorum eum et earum, expedita aliquam, quae ad consequuntur placeat aspernatur eveniet nobis quod.
                                    Laborum, nam incidunt. Nam ducimus nulla, itaque, reiciendis dolores similique inventore ex, iure mollitia eligendi hic necessitatibus aliquam beatae eaque autem aperiam explicabo iste. Placeat tempore neque obcaecati est excepturi!
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
                                        <button title="Supprimer"  onclick="del()"class="ui red button"   style="margin:0px;width:24px;">
                                            <i class="ui trash icon"></i>
                                        </button>
                                        <button title="Envoyer au proprietaire" class="ui teal button" style="margin:0px;width:24px;">
                                            <i class="ui send icon"></i>
                                        </button>
                                        <a href="updatefile.php" title="Modifier les informations" class="ui blue button"  style="margin:0px;width:24px;">
                                            <i class="ui pencil icon"></i>
                                        </a>
                                    </center>

                                </div>
                            </div>
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