<!-- Spielregeln -->
<?php 
	print "
		<h1>Regelwerk:</h1>
		<p>
			<h2>Spielvorbereitung</h2>
			<ul>
				<li>Das Spielfeld besteht aus 6eckigen Feldern (217) mit einer Kantenlänge von 9 Feldern.</li>
				<li>Jeder Spieler fängt an einer Kannte des 6-Ecks an zu spielen.</li>
				<li>Jeder Spieler erhält eine andere Farbe an Spielstein, zur besseren Orientierung.</li>
				<li>Insgesamt hat jeder Spieler 12 Spielsteine auf seiner Seite, welche in 2 Reihen aufgestellt werden (Die Eckpunkte bleiben in 3 Reihen frei).</li>
			</ul>
		</p>
		<p>
			<h2>Ziehen eines Steins</h2>
			<ul>
				<li>Jeder Stein darf pro Zug ein Feld vorwärts gezogen werden.</li>
				<li>Zusätzlich dürfen die Damen auch rückwärts ziehen.</li>
				<li>Mauerflächen dürfen nicht betreten oder übersprungen werden.</li>
				<li>Wenn ein Spieler durch Mauern keinen Zug machen kann darf trotzdem seine Karte ausspielen.</li>
			</ul>
		</p>
		<p>
			<h2>Mauerkarten</h2>
			<ul>
				<li>Jeder Spieler zieht am Anfang seines Zuges eine Karte.</li>
				<li>Es gibt 3 Arten von Karten: Neue Mauer platzieren, Mauer verschieben, Mauer entfernen</li>
				<ul>
					<li>Mauern können 1 bis 4 Felder groß sein.</li>
					<li>Die Form der Mauer ist zufällig.</li>
					<li>Mauern dürfen nicht direkt vor einen gegnerischen Spielstein gesetzt werden.</li>
				</ul>
				<li>Die Karte muss am Ende des Zuges ausgespielt werden.</li>
			</ul>
		</p>
		<p>
			<h2>Schlagen</h2>
			<ul>
				<li>Wenn der Spieler mit seinem eingenen Stein direkt über einen gegnerischen Stein auf ein freies Feld springen kann, wird der gegnerische Stein geschlagen und aus dem Spiel genommen.</li>
				<li>Das Schlagen eines Steins kann mehrmals in einem Zug durchgeführt werden.</li>
				<li>Das erste Schlagen eines Steins muss durchgeführt werden, jedoch sind alle weiteren möglichen Schläge freiwillig und nicht zwingend.</li>
			</ul>
		</p>
		<p>
			<h2>In Dame umwandeln</h2>
			<ul>
				<li>Hat ein Spielstein die gegnerische direkt gegenüberliegende Grundlinie erreicht, wird dieser in eine Dame umgewandelt.</li>
				<li>Damen dürfen vorwärts und rückwärts ziehen und schlagen.</li>
				<li>Damen dürfen keine Mauern überspringen.</li>
			</ul>
		</p>
		<p>
			<h2>Spielende</h2>
			<ul>
				<li>Ein Spieler scheidet aus, wenn er keine Spielsteine mehr hat.</li>
				<li>Wenn ein Spieler aufgibt.</li>
				<li>Gewonnen hat der Spieler, der zuletzt noch Spielsteine hat.</li>
			</ul>
		</p>
	"
?>
<form action= "/spielfeld.php">
	<input type="submit" value="Zurück zum Spielfeld">
</form>