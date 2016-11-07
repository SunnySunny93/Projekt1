<?php
	//Funktion zur Prüfung auf ein Nachbarfeld (Gilt nicht für Damen)
	function ziehen ($ausgangspunkt, $endpunkt) {
		if($ausgangspunkt <800) and ($endpunkt <=800){
			if($endpunkt - 100 == $ausgangspunkt) or ($endpunkt - 101 == $ausgangspunkt){
				return (true);
			} else {
				return (false);
			}
		} elseif($ausgangspunkt >=800) and ($endpunkt >800) {
			if($endpunkt - 100 == $ausgangspunkt) or ($endpunkt - 99 == $ausgangspunkt){
				return (true);
			} else {
				return (false);
			}
		}
	}
	//Funktion zur Prüfung auf ein Nachbarfeld (Damen können in alle Richtungen ziehen)
	function ziehenD ($ausgangspunkt, $endpunkt) {
		if($ausgangspunkt <800) and ($endpunkt <=800){
			if($endpunkt + 1 == $ausgangspunkt) or ($endpunkt - 1 == $ausgangspunkt) {
				return (true);
			} elseif($endpunkt + 100 == $ausgangspunkt) or ($endpunkt + 101 == $ausgangspunkt) {
				return (true);
			} elseif($endpunkt - 100 == $ausgangspunkt) or ($endpunkt - 101 == $ausgangspunkt) {
				return (true);
			} else {
				return (false);
			}
		} elseif($ausgangspunkt >=800) and ($endpunkt >800) {
			if($endpunkt + 1 == $ausgangspunkt) or ($endpunkt - 1 == $ausgangspunkt) {
				return (true);
			} elseif($endpunkt + 100 == $ausgangspunkt) or ($endpunkt + 99 == $ausgangspunkt) {
				return (true);
			} elseif($endpunkt - 100 == $ausgangspunkt) or ($endpunkt - 99 == $ausgangspunkt) {
				return (true);
			} else {
				return (false);
			}
		}
	}
	
	function schlagen ($ausgangspunkt, $endpunkt) {
		if($endpunkt - 200 == $ausgangspunkt) or ($endpunkt - 202 == $ausgangspunkt) {
	}
?>