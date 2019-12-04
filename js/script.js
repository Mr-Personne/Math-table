var answer;

function revision(num) {
    var randNum = Math.round(Math.random() * 10);

    var stringQestion = randNum + " X " + num + "?";
    answer = randNum * num;
    console.log(stringQestion);
    ajaxCallAsynch();
    //timeout so ajax has time to load page
    setTimeout(function () { document.querySelector(".calcule").innerText = stringQestion; }, 500);
}


function checkAnswer(calc) {
    var yourAnswer = document.querySelector(".your-answer").value;
    var section = document.querySelector(".mode-révision");
    if (yourAnswer == answer) {
        section.innerHTML = "Oui! Bravo!";
    }
    else{
        alert("Non! Essaye encore...");
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
        httpRequest.open("GET", "revision.html", true);
        httpRequest.send();

        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState === 4) {
                var section = document.querySelector(".mode-révision");
                section.innerHTML = httpRequest.responseText;
                httpRequest = null;
            }
        }

    }
};

