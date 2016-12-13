<?php
	//Funktion zur Prüfung auf ein Nachbarfeld (Gilt nicht für Damen)
	function ziehen($ausgangspunkt, $endpunkt)
	{
		if(($ausgangspunkt < 800) && ($endpunkt <= 800)){
			return (($endpunkt - 100 == $ausgangspunkt) || ($endpunkt - 101 == $ausgangspunkt));
		} elseif(($ausgangspunkt >= 800) && ($endpunkt > 800)) {
			return (($endpunkt - 100 == $ausgangspunkt) || ($endpunkt - 99 == $ausgangspunkt));
		}
	}
	//Funktion zur Prüfung auf ein Nachbarfeld (Damen können in alle Richtungen ziehen)
	//ToDo: Compress
	//ToDo: Ziehen der dame anpassen
	function ziehenD($ausgangspunkt, $endpunkt)
	{
		if(($ausgangspunkt < 800) && ($endpunkt <= 800)){
			if(($endpunkt + 1 == $ausgangspunkt) || ($endpunkt - 1 == $ausgangspunkt)) {
				return true;
			} elseif(($endpunkt + 100 == $ausgangspunkt) || ($endpunkt + 101 == $ausgangspunkt)) {
				return true;
			} elseif(($endpunkt - 100 == $ausgangspunkt) || ($endpunkt - 101 == $ausgangspunkt)) {
				return true;
			} else {
				return false;
			}
		} elseif($ausgangspunkt >=800) && ($endpunkt >800) {
			if(($endpunkt + 1 == $ausgangspunkt) || ($endpunkt - 1 == $ausgangspunkt)) {
				return true;
			} elseif(($endpunkt + 100 == $ausgangspunkt) || ($endpunkt + 99 == $ausgangspunkt)) {
				return true;
			} elseif(($endpunkt - 100 == $ausgangspunkt) || ($endpunkt - 99 == $ausgangspunkt)) {
				return true;
			} else {
				return false;
			}
		}
	}
	//ToDo: Finish
	//schlagen: mit Überprüfung, ob ein Stein geschlagen werden kann
	function schlagen($ausgangspunkt, $endpunkt)
	{
		if(($endpunkt - 200 == $ausgangspunkt) || ($endpunkt - 202 == $ausgangspunkt)) {
	}

	// function is_neighbor($feld1, $feld2)
	// {
	//
	// }

	function is_blocked($feld)
	{
		//Überprüfung ob ein Spielstein oder eine Mauer auf dem feld steht.
	}

	function feldbelegung ($feld)
	{
		//return Spielstein/ Mauer
	}

	function get_anzahl_mauerstuecke()
	{
		//übergeben wird die Bezeichnung der PNG um daraus die Anzahl der Mauerstücke zu ermitteln
	}
