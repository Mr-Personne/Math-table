// var answer;

var httpRequest = null;

function ajaxCallAsynch(num) {
    if (httpRequest != null) {
        console.log("httpRequest en cours...");
    }
    else {
        httpRequest = new XMLHttpRequest();
        httpRequest.open("GET", "revision.php?currentTable="+num, true);
        httpRequest.send();

        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState === 4) {
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
        section.innerHTML = "<p>Oui! Bravo!</p>";
        // setTimeout(function () { section.innerHTML = "<p></p>";revision(currentNum); }, 1000);
    }
    else{
        section.innerHTML = "<p>Non! Essaye encore...</p>";
        // setTimeout(function () { section.innerHTML = "<p></p>"; }, 2000);
    }
    // console.log(yourAnswer);
};

