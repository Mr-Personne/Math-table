<?php
session_start();
// sleep(1);
// foreach ($_POST as $value){
//     var_dump("post val = ".$value);
//     $num = $value;
// }
print_r($_POST);
if($_POST["your-answer"] == $_SESSION["answer"]){
    $message = "Oui! Bravo";
}
else{
    $message = "Non! Essaye encore!";
}
print_r($_SESSION["tablesArray"]);
$tablesArray = $_SESSION["tablesArray"];
function revision($num) {
    $randNum = rand(0, 10);
    // var_dump($num);
    $stringQestion = $randNum . " x " . $num . " = ??";
    echo $stringQestion;
    $_SESSION["answer"] = $randNum * $num;
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
                <form action ="revision.php" method="post">
                    <?php 
                        foreach ($tablesArray as $num){
                            if ($num !== 0){
                                echo '<input type="checkbox" name="table'.$num.'" value="'.$num.'"> '.$num.'';
                            }
                        }
                        echo '<input type="submit" value="Submit">';
                    ?>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Table de </h2>
                <p>Combien font :</p>
                <p class="calcule"> 
                    <?php 
                        foreach ($_POST as $value){
                            // print_r($value);
                            revision($value);
                        }
                    ?> 
                 </p>
                <form method="post">
                    <input type="text" class="your-answer" name="your-answer">
                    <input type="submit" value="Ok" onclick="ajaxCallAsynch()">
                    <p><?php echo $message; ?></p>
                </form>
            </div>
        </div>
    </div>
</div>