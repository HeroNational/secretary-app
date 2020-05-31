<?php 
    session_start();
    $index="clients";
    include("../../includes/header.php");
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=false){
            header("LOCATION: ../../");
        } 
    }else{
        header("LOCATION: ../../");
    }

?>
<title>Gestion des clients</title>

<body onload="clickl()">

    <div class="ui grid stackable">
        <?php 
            include("../../includes/menu.php");
        ?>
        <div class="ui ten wide column grid"  style="margin-left:10px;">
            <div class="ui teal header">Tous les clients</div>
            <?php for($i=0;$i<20;$i++){ ?>
                <div class="ui five wide column card left floated" style="margin-left:0px;">
                    <div class="image">
                        <img src="../../images/workspace3_122057.png">
                    </div>
                    <div class="content">
                        <div class="header">Title</div>
                        <div class="meta">
                            <a class="group">Meta</a>
                        </div>
                        <div class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae unde, molestias architecto repellat libero, quam natus saepe dolorum itaque expedita debitis doloribus officia repellendus ducimus eligendi, veritatis minus a sint.
                        </div>
                    </div>

                    <div class="ui two column stackable center aligned grid segment small">
                        <a href="#" class="ui button red">
                            <i class="ui trash icon"></i>
                        </a>
                        <a href="#" class="ui button teal">
                            <i class="ui talk icon white"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div> 
        <div class="ui three wide column">
            <br><br>
            <div  style="position:sticky; top:8px" class="ui container">

                <div class="ui teal header">Nouveau client</div>
                <form action="#" class="ui form" method="post">

                    <div class="ui field">
                        <div class="">Nom</div>
                        <div class="ui left icon input">
                            <i class="ui icon user"></i>
                            <input type="text" placeholder="Nom du client" name="nom" id="">
                        </div>
                    </div>

                    <div class="ui field">
                        <div class="">Telephone</div>
                        <div class="ui left icon input">
                            <i class="ui icon weixin"></i>
                            <input type="number" placeholder="Numero de telephone " name="phone" id="">
                        </div>
                    </div>

                    <div class="ui field">
                        <label for="file" class="ui teal button "><i class="ui icon picture"></i> Photo du client</label>
                        <input type="file" style="display:none" name="nom" id="file">
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
    <?php 
        include("../../includes/footer.php");
    ?>
    </div>

    <script>
        function offer() {
            var conf=confirm('Voulez-vous vraiment mettre en veille ce poste?');
            if(conf==true){
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "../traitements/eteindre.php", true);
                xhttp.send();
            }
        }
        function clickl() {

            var menu = document.getElementById('mainmenu');
            menu.style.minHeight = screen.height;
        }
    </script>
</body>