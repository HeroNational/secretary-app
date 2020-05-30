<?php 
    session_start();
    include("../../includes/header.php");
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=false){
            header("LOCATION: ../../");
        } 
    }else{
        header("LOCATION: ../../");
    }

?>

<body onload="clickl()">

    <div class="ui grid stackable">
        <?php 
            include("../../includes/menu.php");
        ?>
        <div class="ui column">
            <div class="ui container" >
                sfwreftef
            </div>
            <?php 
                include("../../includes/footer.php");
            ?>
        </div>
    </div>

    <script>
        function offer() {
            xhttp = new XMLHttpRequest();
            xhttp.open("GET", "../traitements/eteindre.php", true);
            xhttp.send();
        }
        function clickl() {

            var menu = document.getElementById('mainmenu');
            menu.style.minHeight = screen.height;
        }
    </script>
</body>