<style>
    .canvasjs-chart-credit{
        display: none;
    }
</style>
        <div class="ui menu two wide column inverted vertical dark top fixed left aligned" style=";z-index:10203;padding:60px 10px;" id="mainmenu">
            <div class="ui container" style="position:sticky; top:0px;">
                <a href="index.php" class="<?php echo  $index=="index"?"active":''; ?> item teal">Acceuil</a>
                <a href="documents.php" class="item teal <?php echo $index=="documents"?"active":''; ?>"> Documents</a>
                <a href="clients.php" class="<?php echo $index=="clients"?"active":''; ?> item teal">Clients</a>
                <?php 
                    if($_SESSION["role"]=="admin"){
                        ?>
                            <a href="users.php" class="<?php echo $index=="users"?"active":''; ?> item teal">Secretaires</a>
                            <a href="statistics.php" class="<?php echo $index=="statistics"?"active":''; ?> item teal">Statistiques</a>
                        <?php
                    }
                ?>
                <div class="item teal">
                    <a href="../traitements/deconnexion.php" class="ui primary button">
                        <i class="ui log out icon"></i>Deconnexion
                    </a>
                </div>

                <div class="item teal">
                    <a href="#" onclick="offer()" class="ui button red">
                        <i class="ui shutdown icon"></i> Eteindre
                    </a>
                </div>

                <div class="item teal">

                    <a href="javascript:history.go(-1)" title="Retour" class="ui secondary button" style="width:10px">
                        <i class="ui arrow left icon"></i>
                    </a>
                    
                    <a href="javascript:history.go(+1)" title="Suivant" class="ui secondary button" style="width:10px">
                        <i class="ui arrow right icon"></i>
                    </a>

                </div>

            </div>
        </div>

