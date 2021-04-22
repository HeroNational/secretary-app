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


<!-- Loader -->

<style>
    #loader{
    width:100%;
    height:100%;
    display:block;
    position:fixed;
    top:0;
    bottom:0
    }
    .loader{
    background:#000;
    background:radial-gradient(rgb(56, 56, 56),rgb(0, 0, 0));
    bottom:0;
    left:0;
    overflow:hidden;
    position:fixed;
    right:0;
    top:0;
    z-index:99999
    }
    .loader-inner{
    bottom:0;
    height:60px;
    left:0;
    margin:auto;
    position:absolute;
    right:0;
    top:0;
    width:100px
    }
    .loader-line-wrap{
    -webkit-animation:spin 1500ms cubic-bezier(.175,.885,.32,1.275) infinite;
    animation:spin 1500ms cubic-bezier(.175,.885,.32,1.275) infinite;
    box-sizing:border-box;
    height:50px;
    left:0;
    overflow:hidden;
    position:absolute;
    top:0;
    -webkit-transform-origin:50% 100%;
    transform-origin:50% 100%;
    width:100px
    }
    .loader-line{
    border:4px solid transparent;
    border-radius:100%;
    box-sizing:border-box;
    height:100px;
    left:0;
    margin:0 auto;
    position:absolute;
    right:0;
    top:0;
    width:100px
    }
    .loader-line-wrap:nth-child(1){
    -webkit-animation-delay:-50ms;
    animation-delay:-50ms
    }
    .loader-line-wrap:nth-child(2){
    -webkit-animation-delay:-.1s;
    animation-delay:-.1s
    }
    .loader-line-wrap:nth-child(3){
    -webkit-animation-delay:-150ms;
    animation-delay:-150ms
    }
    .loader-line-wrap:nth-child(4){
    -webkit-animation-delay:-.1500ms;
    animation-delay:-.1500ms
    }
    .loader-line-wrap:nth-child(5){
    -webkit-animation-delay:-250ms;
    animation-delay:-250ms
    }
    .loader-line-wrap:nth-child(1) .loader-line{
    border-color:#ea4747;
    height:90px;
    width:90px;
    top:7px
    }
    .loader-line-wrap:nth-child(2) .loader-line{
    border-color:#eaea47;
    height:76px;
    width:76px;
    top:14px
    }
    .loader-line-wrap:nth-child(3) .loader-line{
    border-color:#47ea47;
    height:62px;
    width:62px;
    top:21px
    }
    .loader-line-wrap:nth-child(4) .loader-line{
    border-color:#47eaea;
    height:48px;
    width:48px;
    top:28px
    }
    .loader-line-wrap:nth-child(5) .loader-line{
    border-color:#4747ea;
    height:34px;
    width:34px;
    top:35px
    }
    @-webkit-keyframes spin{
    0%,15%{
    -webkit-transform:rotate(0);
    transform:rotate(0)
    }
    100%{
    -webkit-transform:rotate(360deg);
    transform:rotate(360deg)
    }

    }
    @keyframes spin{
    0%,15%{
    -webkit-transform:rotate(0);
    transform:rotate(0)
    }
    100%{
    -webkit-transform:rotate(360deg);
    transform:rotate(360deg)
    }

    }
    </style>

<div class="loader">
    <div class="loader-inner">
        <div class="loader-line-wrap">
            <div class="loader-line">
            </div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line">
            </div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line">
            </div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line">
            </div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line">
            </div>
        </div>
    </div>
</div>
<script src="../../js/jquery.js"></script>
<script src="../../js/swalall.js"></script>
<script src="../../js/swalmin.js"></script>
<script>
$(document).ready(
    menuHeight());

    function unlogger(){
        Swal.fire({
            title: 'Etes vous sûr (e)?',
            text: "Vous serez déconnecté de ce poste!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'teal',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Je suis sûr (e)',
            cancelButtonText: 'Je ne le veux pas',
            background: '#ffe',
            backdrop: `
                rgba(0,25,123,0.4)
            `,
        }).then((result) => {
            if (result.value) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Opération effectuée avec succes !',
                    background: 'white',
                })

                window.location="../traitements/deconnexion.php"

            }
        })
    
    }

    function offer() {
        Swal.fire({
            title: 'Etes vous sûr (e)?',
            text: "Vous mettrez en veille ce poste et vous ne pourrez revenir en arrière!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'teal',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Je suis sûr (e)',
            cancelButtonText: 'Je ne le veux pas',
            background: '#ffe',
            backdrop: `
                rgba(0,25,123,0.4)
            `,
        }).then((result) => {
            if (result.value) {
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "../traitements/eteindre.php", true);
                xhttp.send();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Opération effectuée avec succes !',
                    background: 'white',
                })
            }
        })
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
                            background: '#fff',
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