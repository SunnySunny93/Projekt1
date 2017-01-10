function aufgeben() {
    if (confirm("Möchtest du wirklich die Partie beenden?") == true) {
        window.location="spielende.php";
    }
}

/*
 * wenn .active < limit
 * dann hex klick = active
 * sonst alert
 *
 * wenn plazieren klick
 * dann form generieren und abschicken
 *
 */