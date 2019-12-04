<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
                            <form action="#">
                                <input type="checkbox" name="table1" value="1"> 1
                                <input type="checkbox" name="table2" value="2"> 2
                                <input type="checkbox" name="table3" value="3" checked> 3
                                <input type="checkbox" name="table1" value="4"> 4
                                <input type="checkbox" name="table2" value="5"> 5
                                <input type="checkbox" name="table3" value="6" checked> 6
                                <input type="checkbox" name="table1" value="7"> 7
                                <input type="checkbox" name="table2" value="8"> 8
                                <input type="checkbox" name="table3" value="9" checked> 9
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

</body>

</html>