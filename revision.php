<?php
session_start();
// sleep(1);
function revision($num) {
    $randNum = rand(0, 10);
    
    $stringQestion = $randNum . " x " . $_SESSION["tableNum"] . " = ??";
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
                <h2 class="fade-anim">Révision</h2>
                <p>Combien font :</p>
                <p class="calcule"> <?php revision($num); ?> </p>
                <input type="text" class="your-answer"><input type="button" value="Ok" onclick="checkAnswer()">
            </div>
        </div>
    </div>
</div>