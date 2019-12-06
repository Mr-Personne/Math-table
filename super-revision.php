<?php
session_start();
// sleep(1);
// foreach ($_POST as $value){
//     var_dump("post val = ".$value);
//     $num = $value;
// }
// print_r($_GET);
// if($_POST["your-answer"] == $_SESSION["answer"]){
//     $message = "Oui! Bravo";
// }
// elseif (isset($_SESSION["your-answer"]) && $_POST["your-answer"] != $_SESSION["answer"]){
//     $message = "Non! Essaye encore!";
// }



// print_r($_SESSION["tablesArray"]);
$tablesArray = $_SESSION["tablesArray"];
function superRevision($num) {
    $answers = "";
    $randNum = rand(0, 10);
    //randArray is to check if random number has already been used in questions
    //avoids duplicate questions
    $randArray = array();
    for ($i = 0; $i < 5; $i++){
        while(in_array($randNum, $randArray)){
            $randNum = rand(0, 10);
        }
        $randArray[] = $randNum;
        $answers .= $randNum * $num.",";
        echo '<p class="calcule">'. $randNum . ' x ' . $num . ' = ??</p>
            <input type="text" class="your-answer" name="your-answer">';
    
    }
    // var_dump($answers);
    echo '<button type="button" class="revision" onclick="checkMultipleAnswers('."'$answers'".')">OK</button>';
    
    // print_r($_SESSION);
    //timeout so ajax has time to load page
    // setTimeout(function () { document.querySelector(".calcule").innerText = stringQestion; }, 500);
}




?>



            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Révision</h2>
                            <p>Veuillez sélectionner une table a réviser :</p>
                                <?php 
                                    foreach ($tablesArray as $num){
                                        if ($num !== 0){
                                            echo '<input type="radio" name="table'.$num.'" value="'.$num.'"> '.$num.'';
                                        }
                                    }
                                    echo '<button type="button" onclick="ajaxCallAsynchSuper(3)">OK</button>';
                                ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h2>Table de <?php foreach ($_GET as $value){ echo $value; } ?></h2>
                            <p>Combien font :</p>
                                <?php 
                                    foreach ($_GET as $value){
                                        // print_r($value);
                                        superRevision($value);
                                    }
                                ?> 
                            <p class="mode-révision"></p>
                        </div>
                    </div>
                </div>
            </div>


        <section>
            
        </section>