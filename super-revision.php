<?php
session_start();
// sleep(1);




// var_dump(is_string($_GET));
$tablesArray = $_SESSION["tablesArray"];
function superRevision($num) {

    //if it detects that $_GET is a string bigger than 1, if it is then explode it because i likely comes from selected radio num
    if(strlen($num) > 1){
        $selectedNum = true;
        $numArr = explode("-", $num);
        // print_r($numArr);
    };
    $answers = "";
    $randNum = rand(0, 10);

    //rand index for to use to choose randomly in my numArr array
    $randIndex = rand(0, count($numArr)-2);
    // var_dump("count() ".count($numArr));

    //randArray is to check if random number has already been used in questions
    //avoids duplicate questions
    $randArray = array();

    for ($i = 0; $i < 5; $i++){
        // var_dump($randIndex." ".$numArr[$randIndex]);
        if($selectedNum){ $num = $numArr[$randIndex]; $randIndex = rand(0, count($numArr)-2); };

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
    
    
    //timeout so ajax has time to load page
    // setTimeout(function () { document.querySelector(".calcule").innerText = stringQestion; }, 500);
}




?>



            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Révision</h2>
                            <p>Veuillez sélectionner une ou des table(s) a réviser :</p>
                                <?php 
                                    foreach ($tablesArray as $num){
                                        if ($num !== 0){
                                            echo '<input type="checkbox" name="table'.$num.'" value="'.$num.'"> '.$num.'';
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