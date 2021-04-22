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
<title>Gestion des clients</title>

<body onload="menuHeight()">

    <div class="ui grid stackable ">
        <?php 
            include("../../includes/menu.php");
        ?><div class="ui ten wide column">
            <br><br>
            <div  style="position:sticky; top:8px" class="ui container">

                <div class="ui blue header">Modifier document</div>
                <form action="#" class="ui form" method="post">

                    <div class="ui two fields">
                        
                        <div class="ui field">
                            <div class="ui">Ancien nom du document</div>
                            <div class="ui left icon input" title="Lecture seule">
                                <i class="ui icon user"></i>
                                <input readonly type="text" placeholder="Nom du document" name="nom" id="">
                            </div>
                        </div>

                        <div class="ui field">
                            <div class="ui">Nouveau nom du document</div>
                            <div class="ui left icon input">
                                <i class="ui icon user"></i>
                                <input type="text" placeholder="Nom du document" name="nom" id="">
                            </div>
                        </div>

                    </div>

                    <div class="ui two fields">

                        
                        <div class="ui field">
                            <div class="ui input" style="float:left">
                                <div class="grouped inline fields">
                                    <label>Ancien etat</label>
                                    <div class="field">
                                        <div class="ui radio checkbox checked">
                                            <input readonly type="radio" checked="checked" name="fruit">
                                            <label>Initial</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui radio checkbox teal">
                                            <input readonly type="radio" name="fruit">
                                            <label>En cours</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input readonly type="radio" name="fruit">
                                            <label>Termine</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            
                        <div class="ui field">
                            <div class="ui input" style="float:left">
                                <div class="grouped inline fields">
                                    <label>Nouvel etat</label>
                                    <div class="field">
                                        <div class="ui radio checkbox checked">
                                            <input type="radio" value="iirgrei" name="dd">
                                            <label>Initial</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui radio checkbox teal">
                                            <input type="radio" value="iirgrei" name="dd">
                                            <label>En cours</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input type="radio" value="iirgrei" name="dd">
                                            <label>Termine</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                        
                    <div class="ui two fields">

                        <div class="ui field">
                            <div class="ui">Ancien proprietaire</div>
                            <div class="ui left icon input">
                                <i class="ui icon weixin"></i>
                                <input readonly type="text" placeholder="Nom du proprietaire" name="phone" id="">
                            </div>
                        </div>

                        <div class="ui field">
                            <div class="ui">Nouveau proprietaire</div>
                            <div class="ui left icon input">
                                <i class="ui icon weixin"></i>
                                <input type="text" placeholder="Nom du proprietaire" name="phone" id="">
                            </div>
                        </div>

                    </div>

                    <div class="ui two fields">

                        <div class="ui field">
                            <div class="ui">Ancien delai</div>
                            <div class="ui left icon input">
                                <i class="ui icon calendar"></i>
                                <input readonly type="date" placeholder="Delai d'envoi du document" name="phone" id="">
                            </div>
                        </div>
                        
                        <div class="ui field">
                            <div class="ui">Nouveau delai</div>
                            <div class="ui left icon input">
                                <i class="ui icon calendar"></i>
                                <input type="date" placeholder="Delai d'envoi du document" name="phone" id="">
                            </div>
                        </div>

                    </div>

                    <div class="ui two fields">

                        <div class="ui field">
                            <div class="ui top labeled">
                                <div class="ui">Secretaire en charge du document</div>
                                <select readonly name="" id="">
                                    <option value="#">secretary</option>
                                    <option value="#">Mbarga</option>
                                    <option value="#">Olinga</option>
                                </select>
                            </div>
                        </div>

                        <div class="ui field">
                            <div class="ui top labeled">
                                <div class="ui">Secretaire en charge du document</div>
                                <select readonly name="" id="">
                                    <option value="#">secretary</option>
                                    <option value="#">Mbarga</option>
                                    <option value="#">Olinga</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="ui two fields">

                        <div class="ui field">
                            <div class="ui top labeled">
                                <div class="ui">Description du document</div>
                                <textarea readonly name="description" id="" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="ui field">
                            <div class="ui top labeled">
                                <div class="ui">Description du document</div>
                                <textarea name="description" id="" cols="30" rows="4"></textarea>
                            </div>
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
    <?php 
    $exist=1;

        include("../../includes/footer.php");
    ?>
    </div>

</body>