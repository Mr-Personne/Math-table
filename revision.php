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
function revision($num) {
    $randNum = rand(0, 10);
    // var_dump($num);
    // $stringQestion = '<p class="calcule">'. $randNum . ' x ' . $num . ' = ??</p>';
    // $_SESSION["answer"] = $randNum * $num;
    // echo $stringQestion;
    echo '<p class="calcule">'. $randNum . ' x ' . $num . ' = ??</p>
            <input type="text" class="your-answer" name="your-answer">
            <button type="button" class="revision" onclick="checkAnswer('.$randNum * $num.')">OK</button>';
    
    // print_r($_SESSION);
    //timeout so ajax has time to load page
    // setTimeout(function () { document.querySelector(".calcule").innerText = stringQestion; }, 500);
}




?>



            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2>Révision : Table de <?php foreach ($_GET as $value){ echo $value; } ?></h2>
                            <p>Combien font :</p>
                                <?php 
                                    foreach ($_GET as $value){
                                        // print_r($value);
                                        revision($value);
                                    }
                                ?> 
                            <p class="mode-révision"></p>
                        </div>
                    </div>
                </div>
            </div>


        <section>
            
        </section>
        