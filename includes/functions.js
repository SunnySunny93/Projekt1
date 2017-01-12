var funktion = "";
var anzahl = 0;
var spieler = "";
var ablauf = "";
var mauern = [];
var felder = [];
var ajax_abfrage = new XMLHttpRequest();                     // neues AJAX request objekt
ajax_abfrage.onload = function() {                           // funktion nach dem call
    var response = JSON.parse(this.responseText);       // umwandeln von JSON String in objekt
    console.log(response.karte.funktion, response.karte.anzahl, response.spieler, response.ablauf);    // debug ausgabe der empfangenen werte
    funktion = response.karte.funktion;                       // funktions variable global abspeichern
    anzahl = response.karte.anzahl;                           // anzahl variable global abspeichern
    spieler = response.spieler;
    ablauf = response.ablauf;
    if(funktion == "verschieben") {
        anzahl = anzahl*2;
    }else if(ablauf == "ziehen"){
        anzahl = 2;
    }
};
ajax_abfrage.open("get", "../includes/ajax.php", false);     // methode (get) und zieladresse angeben
ajax_abfrage.send();                                         // request abschicken

function aufgeben()
{
    if (confirm("Möchtest du wirklich die Partie beenden?") == true) {
        window.location="spielende.php";
    }
}

function hexagon()
{
    var current_classes = this.getAttribute("class");
    var klickable = false;
    var movable = false;
    if(this.getElementsByClassName("spielericon").length <= 0){
        if(ablauf == "ziehen" && current_classes.indexOf("wall") > 0){
            klickable = false;
        }else{
            klickable = true;
        }

    }else if(this.getElementsByClassName("spieler"+spieler).length > 0){
        movable = true;
        if(ablauf == "ziehen"){
            klickable = true;
        }
    }else{
        klickable = false;
    }
    console.log(felder.length);
    console.log(klickable);

    if(klickable){


        if(current_classes.indexOf("active") > 0){
            current_classes = current_classes.replace(" active", "");
            this.setAttribute("class", current_classes);
            mauern.splice(mauern.indexOf(this), 1);
            felder.splice(mauern.indexOf(this), 1);
        }else{
            if(document.getElementsByClassName('active').length < anzahl) { // wenn weniger felder aktiv sind als möglich
                console.log("ablauf: ", ablauf);
                console.log("movable: ", movable);

                this.setAttribute("class", current_classes + " active");
                if(ablauf == "mauer"){
                    mauern.push(this);
                }else{
                    felder.push(this);
                }
                console.log("length: ", felder.length);
            }else{
                alert("du kannst nur " + anzahl + " felder auswählen");
            }
        }
    }
}

function steinBewegen()
{
    var liste = [];
    for(var i = 0;i < felder.length;i++) {
        liste.push(felder[i].getAttribute("id"));
    }
    var ajax_antwort = new XMLHttpRequest();
    ajax_antwort.onload = function() {
        console.log(this.responseText);
        location.reload();
    };
    ajax_antwort.open("POST", "../includes/ajax.php");
    ajax_antwort.setRequestHeader("Content-Type", "application/json");
    ajax_antwort.send(JSON.stringify({funktion:"ziehen", liste:liste}));
}

function mauerFestlegen()
{
    var liste = [];
    for(var i = 0;i < mauern.length;i++) {
        mauern[i].setAttribute("class", "hex wall")
        liste.push(mauern[i].getAttribute("id"));
    }

    var ajax_antwort = new XMLHttpRequest();
    ajax_antwort.onload = function() {
        console.log(this.responseText);
        anzahl = 2;
        funktion = "ziehen";
        location.reload();
    };
    ajax_antwort.open("POST", "../includes/ajax.php");
    ajax_antwort.setRequestHeader("Content-Type", "application/json");
    ajax_antwort.send(JSON.stringify({funktion:funktion, liste:liste}));
}

function zugBeenden() {
    var beenden_antwort = new XMLHttpRequest();
    beenden_antwort.onload = function() {
        console.log(this.responseText);
        location.reload();
    };
    beenden_antwort.open("POST", "../includes/ajax.php");
    beenden_antwort.setRequestHeader("Content-Type", "application/json");
    beenden_antwort.send(JSON.stringify({funktion: "naechsterZug"}));
}

function reset() {
    var reset_request = new XMLHttpRequest();
    reset_request.onload = function() {
        location.reload();
    };
    reset_request.open("get", "../includes/reset.php");
    reset_request.setRequestHeader("Content-Type", "application/json");
    reset_request.send();
}

document.addEventListener("DOMContentLoaded", function() {
    var hexagons = document.getElementsByClassName('hex');

    for(var i = 0;i < hexagons.length;i++) {
        hexagons[i].addEventListener("click", hexagon);
    }
});