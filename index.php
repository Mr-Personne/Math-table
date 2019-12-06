<?php
session_start();
// print_r($_SESSION);
// print_r($_POST);
//generates table
$tablesArray = array();
for ($i = 0; $i <= 10; $i++){
    $tablesArray[] = $i;
}
// var_dump($tablesArray);
$_SESSION["tablesArray"] = $tablesArray;

function generateTable($tableNum = 3){
    
    // $_SESSION[$tableNum] = $tableNum;
    //generates lines to be added later in container echo
    $lines = '<p class="fade-anim">1 x '.$tableNum.' = '.(1*$tableNum).'</p>';
    for ($i = 2; $i <= 10; $i++){
        $lines .= '<p class="fade-anim">'.$i.' x '.$tableNum.' = '.($i*$tableNum).'</p>';
    };


        echo '<div class="col">
                <h2 class="fade-anim">Table de '.$tableNum.'</h2>
                '.$lines.'
                <button type="button" class="revision"
                    onclick="ajaxCallAsynch('.$tableNum.')" value='.$tableNum.'>Teste moi!</button>
            </div>';
    
}






?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Math Tables!</title>

    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Réaliser une mini application de tables de multiplications.

    Afficher la table de multiplication de 3.
    Sélectionner une table de multiplication entre 1 et 10 dans une liste déroulante select.
    On valide et la table de multiplication sélectionée s'affiche en dessous.
    Le choix de la ou des  table(s) de multiplication à afficher se fait par checkboxes et par un bouton "valider". La ou les  table(s) de multiplication sélectionée(s) s'affiche(nt) en dessous.
    Intégrer un mode révision : l'utilisateur choisit une table de multiplication et doit répondre à une multiplication tirée au hasard dans la table sélectionnée.

Bonus :

    Super Mode révision : Poser une série de 5 questions puis afficher le score.
    Appliquer un aspect "Material design".
    L'ensemble du site est reponsive.

Une fois l'étape 4 finalisée : intégrer AJAX au mode révision afin de rendre l'utilisation du mode révision plus fluide. -->
    <header>
        <div class="container-fluid">
            <div class="container">
                <div class="row d-flex">
                    <div class="col">
                        <h1>Math Tables!</h1>
                    </div>

                    <div class="col">
                        <nav>
                            <form method="post">
                                <?php 
                                    foreach ($tablesArray as $num){
                                        if ($num !== 0){
                                            echo '<input type="checkbox" name="table'.$num.'" value="'.$num.'"> '.$num.'';
                                        }
                                    }
                                    echo '<input type="submit" value="Valider">';
                                ?>
                            </form>
                        </nav>
                    </div>

                    <div class="col">
                    <button type="button" onclick="ajaxCallAsynchSuper(3)">Mode Super Révision</button> 
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="">
            <div class="container-fluid">
                    <div class="container">
                        <div class="row flex-space-a">
                            <?php
                                // var_dump();
                                if (count($_POST) == 0){
                                    // echo "generating default table";
                                    generateTable();
                                    
                                }
                                else{
                                    // echo "generating checked table(s)";
                                    foreach ($_POST as $value){
                                        // print_r($value);
                                        generateTable($value);
                                    }
                                }

                            ?>
                        </div>
                    </div>
                </div>
            
        </section>

        <section class="mode-révision">
            
        </section>
    </main>


    <!-- background image -->
    <!-- <a href="http://www.freepik.com">Designed by Dashu83 / Freepik</a> -->
    
    <script src="js/script.js"></script>
</body>

</html>