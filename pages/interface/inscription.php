<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=0, initial-scale=1.0">
    
    <?php 
        include("../../includes/header.php");
        if(isset($_SESSION['status'])){
            if($_SESSION['status']==false){
                header("LOCATION: ./");
            } 
        }

    ?>

    <title>Connexion</title>

    <style type="text/css">
        body {
            background-color: #DADADA;
        }
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 450px;
        }
    </style>
    
</head>
<body>
    
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            
            <?php
                if(isset($_SESSION['status'])){
                    if($_SESSION['status']==false){
            ?>
                <div class="ui red message">
                    Acces refuse, reessayez la connection avec des identifiants corrects.
                </div>
            <?php
                    }

                }
            ?>

            <?php
                if(isset($_SESSION['message'])){
                    if(!empty($_SESSION['message'])){
            ?>
                <div class="ui info message">
                    <?php echo $_SESSION['message'] ?>.
                </div>
            <?php
                        $_SESSION['message']="";
                    }
                }
            ?>

            <h2 class="ui teal image header">
                <img src="../../images/workspace3_122057.png" style="width:200px;" class="image">
            </h2>
            <form class="ui large form" action="../traitements/connexion.php" method="post">

                <div class="ui stacked segment">

                    <div class="field teal">
                        <div class="ui left icon input">
                            <i class="user icon teal"></i>
                            <input required type="text" name="login" placeholder="Login">
                        </div>
                    </div>

                    <div class="field teal">
                        <div class="ui left icon input">
                            <i class="lock icon teal"></i>
                            <input required type="password" name="password" placeholder="Mot de passe">
                        </div>
                    </div>
                    

                    <div class="field teal">
                        <div class="ui left icon input">
                            <i class="key icon teal"></i>
                            <input required type="password" name="password" placeholder="Mot de passe administrateur">
                        </div>
                    </div>
                    
                    <button class="ui fluid large teal submit button">Inscription</button>
                </div>

                <div class="ui error message"></div>

            </form>

            <div class="ui message">
                Deja employer ? <a href="connexion.php">connexion</a>
            </div>
        </div>
    </div>

</body>
</html>