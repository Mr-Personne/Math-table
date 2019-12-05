<?php
// session_start();
// print_r($_SESSION);
//generates table
$tablesArray = array();
for ($i = 0; $i <= 10; $i++){
    $tablesArray[] = $i;
}

function generateTable($tableNum = 3){
    
    // $_SESSION[$tableNum] = $tableNum;
    //generates lines to be added later in container echo
    $lines = '<p class="fade-anim">1 X '.$tableNum.' = '.(1*$tableNum).'</p>';
    for ($i = 2; $i <= 10; $i++){
        $lines .= '<p class="fade-anim">'.$i.' X '.$tableNum.' = '.($i*$tableNum).'</p>';
    };


        echo '<div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 class="fade-anim">Table de '.$tableNum.'</h2>
                            '.$lines.'
                            <form action="#" method="get">
                            <input type="button" class="revision"
                             onclick="revision('.$tableNum.')" value="Teste moi!">
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
    
}



// function revision($num) {
//     $randNum = rand(0, 10);
//     print_r($_SESSION["tableNum"]);
//     $stringQestion = $randNum . " X " . $num . " = ";
//     echo $stringQestion;
//     $answer = $randNum * $num;
//     //timeout so ajax has time to load page
//     // setTimeout(function () { document.querySelector(".calcule").innerText = stringQestion; }, 500);
// }

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
                    <div class="col-6">
                        <h1>Math Tables!</h1>
                    </div>

                    <div class="col-6">
                        <nav>
                            <form method="post">
                                <?php 
                                    foreach ($tablesArray as $num){
                                        if ($num !== 0){
                                            echo '<input type="checkbox" name="table'.$num.'" value="'.$num.'"> '.$num.'';
                                        }
                                    }
                                    echo '<input type="submit" value="Submit">';
                                ?>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="d-flex flex-space-a">
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
        </section>

        <section class="mode-révision">
            
        </section>
    </main>


    <!-- background image -->
    <!-- <a href="http://www.freepik.com">Designed by Dashu83 / Freepik</a> -->
    
    <script src="js/script.js"></script>
</body>

</html>