<br><br>
<span class="ui three item black menu bottom fixed segment inverted" style="height:30px;">
    <span class="item">
        <a href="../traitements/deconnexion.php" class="header"><i class="ui icon power" title="Deconnexion"></i>&nbsp;&nbsp;</a>&nbsp;&nbsp;
        <span class="date" style="margin-left:2px;">
            <?php 
                $jour=array(1=>"Lundi, ",2=>"Mardi, ",3=>"Mercredi, ",4=>"Jeudi, ",5=>"Vendredi, ",6=>"Samedi, ",0=>"Dimanche, ");
                $moi=array('01'=>"janvier ",'02'=>"fevrier ",'03'=>"mars ",'04'=>"avril ",'05'=>"mai ",'06'=>"juin ",'07'=>"juillet ",'08'=>"aout ",'09'=>"septembre ",'10'=>"octobre ",'11'=>"novembre ",'12'=>"decembre ");
                $i=Date("w");
                $jour[$i];
                echo date('j')." ";
                $i=Date("m");
                echo $moi[$i];
                echo date('o')." ";
            ?>
             
            <span style="" id="horloge"></span>
        </span>
    </span>
        <span class="item"> &copy; SECRETARIAT &compfn; 2019-  <?php $h=explode(" ",date("r"));  echo $h['3'];?></span>
    <span class="item">
        <a href="help.php" class="underlined"><span class="lnr lnr-question-circle"></span>&nbsp;&nbsp;&nbsp;&nbsp;Besoin d'aide?</a>
    </span>
</span>
