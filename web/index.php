<!Doctype html>
<html lang=de>
	<head>
		<Meta charset=utf-8 />
		<title>Index</title>
	</head>
	<body>
		<main>
			<h1> Willkommen bei Dame 2.0 </h1>
			<h2> Login </h2> <!-- I Login -->
			<!-- Hier wird der Benutzername und das Passwort eingegeben -->
            <form action= "einstellungen.php" method="POST">
                <table>
                    <tr>
                        <td><label for=email> E-Mail Adresse eingeben:</label></td><td> <input id=email name=email required> </td>
                    </tr>
                    <tr>
                        <td><label for=password1> Passwort eingeben:</label></td><td> <input type=password name=password1 id=password1 required> </td>
                    </tr>
                    <tr>
                        <td></td><td><input type=submit name=Login value=Login></td>
                    </tr>
                </table>
            </form>

			<h2>Noch keinen Account? </h2> <!-- V Account erstellen -->
            <form action= "einstellungen.php" method="POST">
                <table>
                    <tr>
                        <td><label for=email> E-Mail Adresse eingeben:</label></td><td> <input id=email name=email required> </td>
                    </tr>
                    <tr>
                        <td><label for=nickname> Nickname eingeben:</label></td><td> <input id=nickname name=nickname required> </td>
                    </tr>
                    <tr>
                        <td><label for=password1> Passwort eingeben:</label></td><td> <input type=password name=password1 id=password1 required> </td>
                    </tr>
                    <tr>
                        <td><label for=password2> Passwort wiederholen:</label></td><td> <input type=password name=password2 id=password2 required> </td>
                    </tr>
                    <tr>
                        <td></td><td><input type=submit name=Register value=Registieren></td>
                    </tr>
                </table>
            </form>
            <script>
                var password = document.getElementById("password1");
                var confirm_password = document.getElementById("password2");
                function validatePassword(){
                    if(password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Passwörter stimmen nicht überein");
                    } else {
                        confirm_password.setCustomValidity('');
                    }
                }
                password.onchange = validatePassword;
                confirm_password.onkeyup = validatePassword;
            </script>
            <h2>Du kannst auch als Gast spielen </h2> <!-- II Gastzugang erstellen -->
            <form action= "einstellungen.php">
                <table>
                    <tr>
                        <td><label for=player> Spielername:</label></td><td> <input id=player name=player required> </td>
                    </tr>
                    <tr>
                        <td></td><td><input type=submit name=Login value="Jetzt spielen"></td>
                    </tr>
                </table>
            </form>

        </main>
	</body>

</html>
