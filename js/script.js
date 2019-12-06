// var answer;
var currentNum = 3;

var httpRequest = null;

function ajaxCallAsynch(num) {
    if (httpRequest != null) {
        console.log("httpRequest en cours...");
    }
    else {
        httpRequest = new XMLHttpRequest();
        httpRequest.open("GET", "revision.php?currentTable=" + num, true);
        httpRequest.send();

        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState === 4) {
                currentNum = num;
                var section = document.querySelector(".mode-révision");
                var mainSection = document.querySelector("section:first-child");
                // console.log("httpRequest : ",httpRequest);
                mainSection.innerHTML = httpRequest.responseText;
                httpRequest = null;
            }
        }

    }
};

function ajaxCallAsynchSuper(num) {
    if (httpRequest != null) {
        console.log("httpRequest en cours...");
    }
    else {
        httpRequest = new XMLHttpRequest();
        httpRequest.open("GET", "super-revision.php?currentTable=" + num, true);
        httpRequest.send();

        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState === 4) {
                currentNum = num;
                var section = document.querySelector(".mode-révision");
                var mainSection = document.querySelector("section:first-child");
                // console.log("httpRequest : ",httpRequest);
                mainSection.innerHTML = httpRequest.responseText;
                httpRequest = null;
            }
        }

    }
};

function checkAnswer(answer) {
    var yourAnswer = document.querySelector(".your-answer").value;
    var section = document.querySelector(".mode-révision");
    console.log("yourAnswer : ",yourAnswer, " answer : ",answer);
    if (yourAnswer == answer) {
        section.innerHTML = '<p>Oui! Bravo!</p><button type="button" class="revision" onclick="ajaxCallAsynch(' + currentNum + ')">Re-teste moi!</button>';
        // setTimeout(function () { section.innerHTML = "<p></p>";revision(currentNum); }, 1000);
    }
    else{
        section.innerHTML = "<p>Non! Essaye encore...</p>";
        setTimeout(function () { section.innerHTML = "<p></p>"; }, 2000);
    }
    // console.log(yourAnswer);
};

function checkMultipleAnswers(answer) {
    var yourAnswer = document.querySelectorAll(".your-answer");
    var section = document.querySelector(".mode-révision");
    var correctAnswers = answer.split(",");
    var score = 0;
    console.log("yourAnswer : ", yourAnswer, " answer : ", answer);
    for (var i=0; i < correctAnswers.length-1 ; i++){
        if (yourAnswer[i].value == correctAnswers[i]) {
            score += 1;
            
            // setTimeout(function () { section.innerHTML = "<p></p>";revision(currentNum); }, 1000);
        }
        console.log(correctAnswers[i]);
    }
    section.innerHTML = '<p>Votre score est de : '+ score +'/5</p><button type="button" class="revision" onclick="ajaxCallAsynchSuper(' + currentNum + ')">Re-teste moi!</button>';
    // console.log(yourAnswer);
};

