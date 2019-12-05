var answer;
var currentNum = 3;

function revision(num) {
    //assigns global variable currentNum to sent num parameter so that it can
    // potentialy be re-used if they want another question in the same table
    currentNum = num;
    var randNum = Math.round(Math.random() * 10);

    var stringQestion = randNum + " X " + currentNum + " = ??";
    answer = randNum * currentNum;
    console.log(stringQestion);
    ajaxCallAsynch("revision.php");
    // timeout so ajax has time to load page
    setTimeout(function () { document.querySelector(".calcule").innerText = stringQestion; }, 500);
}


function checkAnswer(calc) {
    var yourAnswer = document.querySelector(".your-answer").value;
    var section = document.querySelector(".mode-révision");
    if (yourAnswer == answer) {
        section.innerHTML = "<p>Oui! Bravo!</p>";
        setTimeout(function () { section.innerHTML = "<p></p>";revision(currentNum); }, 1000);
    }
    else{
        section.innerHTML = "<p>Non! Essaye encore...</p>";
        setTimeout(function () { section.innerHTML = "<p></p>"; }, 2000);
    }
    console.log(yourAnswer);
}

var httpRequest = null;

function ajaxCallAsynch(pageToLoad) {
    if (httpRequest != null) {
        console.log("httpRequest en cours...");
    }
    else {
        httpRequest = new XMLHttpRequest();
        httpRequest.open("GET", pageToLoad, true);
        httpRequest.send();

        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState === 4) {
                var section = document.querySelector(".mode-révision");
                var mainSection = document.querySelector("section:first-child");
                mainSection.innerHTML = httpRequest.responseText;
                httpRequest = null;
            }
        }

    }
};

