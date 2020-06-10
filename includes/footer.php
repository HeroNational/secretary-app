<br><br>
<span class="ui three item black menu bottom fixed segment inverted"  id="hghg" style="height:30px;">
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


<script src="../../js/jquery.js"></script>
<script src="../../js/swalall.js"></script>
<script src="../../js/swalmin.js"></script>
<script>
    function offer() {
        var conf=confirm('Voulez-vous vraiment mettre en veille ce poste?');
        if(conf==true){
            xhttp = new XMLHttpRequest();
            xhttp.open("GET", "../traitements/eteindre.php", true);
            xhttp.send();
        }
    }
    function menuHeight() {

        var menu = document.getElementById('mainmenu');
        menu.style.minHeight = screen.height;
        
            <?php 

                if(!isset($existS)){
                    $existS=1;
                }
                if(!isset($existC)){
                    $existC=1;
                }

                if($existS==0 && $existC==0){
                    $text="Impossible d\'enregistrer un document s\'il n\'y a pas de client existant et  de secretaire existante.";
                    $footer="<a href=\'clients.php\'>Enregistrer un client?</a>&nbsp;&nbsp;<a href=\'users.php\'>Enregistrer une secretaire?</a>";
                }else{
                    if($existS==1 && $existC==0){
                        $text="Impossible d\'enregistrer un document s\'il n\'y a pas de client existant.";
                        $footer="<a href=\'clients.php\'>Enregistrer un client?</a>";
                    }else{
                        if($existS==0 && $existC==1){
                            $text="Impossible d\'enregistrer un document s\'il n\'y a pas de secretaire existante.";
                            $footer="<a href=\'users.php\'>Enregistrer une secretaire?</a>";
                        }
                    }
                }
            if($existS==0 || $existC==0 ){
                $exist=1;
            }
            if($existS==0 || $existC==0){
            ?>
 
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?php echo  $text; ?>',
                footer: '<?php echo $footer ?>',
                background: '#ffe',
                backdrop: `
                    rgba(0,25,123,0.4)
                `,
                showConfirmButton:false,
                showCloseButton:true,
            })
        <?php 
            }
        ?>
        
            <?php 
                if($exist==0){
            ?>
 
                Swal.fire({
                    title: 'Oups...!',
                    text: 'Aucun enregistrement pour cette section.',
                    padding: '3em',
                    background: '#fff url(../../../images/workspace1_122059.png)',
                    backdrop: `
                        rgba(0,25,123,0.4)
                        center left
                        no-repeat
                    `,
                    showConfirmButton:false,
                    showCloseButton:true,
                })

            <?php
                }
            ?>

    }
</script>
<script>


    function deletefile(id) {
        var idr = "#line" + id;
        Swal.fire({
            title: 'Etes vous sure ?',
            text: "Vous ne pourriez revenir en arrière!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085k4',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer !',
            background: '#ffe',
            backdrop: `
                rgba(0,25,123,0.4)
            `,
        }).then((result) => {
            if (result.value) {
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "../traitements/deletefile.php?id=" + id, true);
                xhttp.send();
                 const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Fichier supprime avec succes !',
                    background: 'white',
                })
                $(idr).hide();
            }
        })
    }
    function deleteclient(id) {
        var idr = "#line" + id;
        Swal.fire({
            title: 'Etes vous sure ?',
            text: "Vous ne pourriez revenir en arrière!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085k4',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer !',
            background: '#ffe',
            backdrop: `
                rgba(0,25,123,0.4)
            `,
        }).then((result) => {
            if (result.value) {
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "../traitements/deleteclient.php?id=" + id, true);
                xhttp.send();
                 const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Client supprime avec succes !',
                    background: 'white',
                })
                $(idr).hide(150);
            }
        })
    }

    function deleteuser(id) {
        var idr = "#line" + id;
        Swal.fire({
            title: 'Etes vous sure ?',
            text: "Vous ne pourriez revenir en arrière!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085k4',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer !',
            background: '#ffe',
            backdrop: `
                rgba(0,25,123,0.4)
            `,
        }).then((result) => {
            if (result.value) {
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "../traitements/deleteuser.php?id=" + id, true);
                xhttp.send();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Secretaire supprime avec succes !',
                    background: 'white',
                }).then((result) => {
                        /* Swal.fire({
                            title: 'Oups...!',
                            text: 'Aucun enregistrement pour cette section.',
                            padding: '3em',
                            background: '#fff url(../../../images/workspace1_122059.png)',
                            backdrop: `
                                rgba(0,25,123,0.4)
                                center left
                                no-repeat
                            `,
                            showConfirmButton:false,
                            showCloseButton:true,
                        }) 
                        //linear-gradient(to top, #37ecba 0%, #72afd3 100%)
                        */
                    }
                );
                $(idr).hide(150);
            }
        })
    }

</script>