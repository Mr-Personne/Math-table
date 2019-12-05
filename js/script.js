var answer;

var httpRequest = null;

function ajaxCallAsynch(pageToLoad) {
    if (httpRequest != null) {
        console.log("httpRequest en cours...");
    }
    else {
        httpRequest = new XMLHttpRequest();
        httpRequest.open("GET", "revision.php", true);
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

