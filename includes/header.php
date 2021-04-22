<meta charset="UTF-8">
<meta name="viewport" content="width=0, initial-scale=1.0">
    
<link rel="stylesheet" type="text/css" href="../../css/dist/components/reset.css">

<link rel="stylesheet" type="text/css" href="../../css/dist/components/container.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/grid.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/header.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/image.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/menu.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/divider.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/segment.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/form.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/input.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/button.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/semantic.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/list.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/message.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/icon.css">
<link rel="shortcut icon" href="../../images/workspace1_122059.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/dropdown.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/card.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/label.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/checkbox.css">
<link rel="stylesheet" type="text/css" href="../../css/dist/components/table.css">
<link rel="stylesheet" type="text/css" href="../../css/swal.css">
<link rel="stylesheet" type="text/css" href="../../css/animate.css">
<script scr="../../css/dist/jquery3.4.1.js"></script>
<script src="../../js/horloge.js"></script>
<?php 
    function Is_daytime(){

        $now=time();

        $longitude = 52.27026;
        $latitude  = -1.89188;
        
        $sun    = date_sun_info ( $now, $longitude, $latitude);
        $light  = $sun['civil_twilight_begin'];
        $dark   = $sun['civil_twilight_end'];

        if (($now > $light && $now < $dark)) {
            //It's daytime
            return true;
        }else{
        //It's daytime
            return false;
        }
    }
    include("../../includes/connexionBd.php");
    $exist=0;
?>
<style>
    <?php
        if(!Is_daytime()){
    ?>
    html{
        background:rgba(0,0,100)!important,
        color:white!important,
    }
    <?php
        }
    ?>
</style>
<script>
  
  addEventListener("load",()=>{
        $("html, body").css({overflow:"hidden"})
        $(".loader").hide().then($("body").show("100"))
    });

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
    if(($existS==0 || $existC==0)){
        if(!isset($_GET['toast'])){

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
    }
?>

<?php 
        if(isset($_GET['toast']) &&  $existS==0){
    ?>

        Swal.fire({
            title: 'Oups...!',
            text: 'Aucun enregistrement pour cette section.',
            padding: '3em',
            //background: '#fff url(../../../images/workspace1_122059.png)',
            background: '#fff',
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

<?php 
        if(isset($_GET['toast']) &&  $existC==0){
    ?>

        Swal.fire({
            title: 'Oups...!',
            text: 'Aucun enregistrement pour cette section.',
            padding: '3em',
            //background: '#fff url(../../../images/workspace1_122059.png)',
            background: '#fff',
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

