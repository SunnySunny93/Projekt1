<html lang=de>

<head>
	<Meta charset=utf-8 />
	<title>Spielfeld</title>
</head>

<body>
	<main>
		<table border=0 width='849px' height='746' background='Bilder/Spielfeld.png' background-size=auto>
			<colgroup span='32' width=auto></colgroup>
			<tr align='center' valign='center'>
				<td colspan=34></td>
			</tr>
			<?php
				//spielfeld generieren
				$rows = 15;
				$cols = 8;
				$span = 7;
				$operator = 1;
				for($row = 1;$row <= $rows;$row++) {
					echo "<tr align='center' valign='center'>";
					echo $span != 0 ? "<td colspan=$span></td>" : "";
					for($col = 1;$col <= $cols;$col++) {
						$id = $row . sprintf('%02d', $col);
						echo "<td colspan=2 id=$id>$id</td>";
					}
					echo $span != 0 ? "<td colspan=$span></td>" : "";
					echo "</tr>";
					if($cols >= $rows){
						$operator = -1;
					}
					$cols += $operator;
					$span -= $operator;
				}
			?>

			<!-- <tr align='center' valign='center'>
				<td colspan=7></td>
				<td colspan=2>101</td>
				<td colspan=2>102</td>
				<td colspan=2>103</td>
				<td colspan=2>104</td>
				<td colspan=2>105</td>
				<td colspan=2>106</td>
				<td colspan=2>107</td>
				<td colspan=2>108</td>
				<td colspan=7></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=6></td>
				<td colspan=2>201</td>
				<td colspan=2>202</td>
				<td colspan=2>203</td>
				<td colspan=2>204</td>
				<td colspan=2>205</td>
				<td colspan=2>206</td>
				<td colspan=2>207</td>
				<td colspan=2>208</td>
				<td colspan=2>209</td>
				<td colspan=6></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=5></td>
				<td colspan=2>301</td>
				<td colspan=2>302</td>
				<td colspan=2>303</td>
				<td colspan=2>304</td>
				<td colspan=2>305</td>
				<td colspan=2>306</td>
				<td colspan=2>307</td>
				<td colspan=2>308</td>
				<td colspan=2>309</td>
				<td colspan=2>310</td>
				<td colspan=5></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=4></td>
				<td colspan=2>401</td>
				<td colspan=2>402</td>
				<td colspan=2>403</td>
				<td colspan=2>404</td>
				<td colspan=2>405</td>
				<td colspan=2>406</td>
				<td colspan=2>407</td>
				<td colspan=2>408</td>
				<td colspan=2>409</td>
				<td colspan=2>410</td>
				<td colspan=2>411</td>
				<td colspan=4></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=3></td>
				<td colspan=2>501</td>
				<td colspan=2>502</td>
				<td colspan=2>503</td>
				<td colspan=2>504</td>
				<td colspan=2>505</td>
				<td colspan=2>506</td>
				<td colspan=2>507</td>
				<td colspan=2>508</td>
				<td colspan=2>509</td>
				<td colspan=2>510</td>
				<td colspan=2>511</td>
				<td colspan=2>512</td>
				<td colspan=3></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=2></td>
				<td colspan=2>601</td>
				<td colspan=2>602</td>
				<td colspan=2>603</td>
				<td colspan=2>604</td>
				<td colspan=2>605</td>
				<td colspan=2>606</td>
				<td colspan=2>607</td>
				<td colspan=2>608</td>
				<td colspan=2>609</td>
				<td colspan=2>610</td>
				<td colspan=2>611</td>
				<td colspan=2>612</td>
				<td colspan=2>613</td>
				<td colspan=2></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=1></td>
				<td colspan=2>701</td>
				<td colspan=2>702</td>
				<td colspan=2>703</td>
				<td colspan=2>704</td>
				<td colspan=2>705</td>
				<td colspan=2>706</td>
				<td colspan=2>707</td>
				<td colspan=2>708</td>
				<td colspan=2>709</td>
				<td colspan=2>710</td>
				<td colspan=2>711</td>
				<td colspan=2>712</td>
				<td colspan=2>713</td>
				<td colspan=2>714</td>
				<td colspan=1></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=2>801</td>
				<td colspan=2>802</td>
				<td colspan=2>803</td>
				<td colspan=2>804</td>
				<td colspan=2>805</td>
				<td colspan=2>806</td>
				<td colspan=2>807</td>
				<td colspan=2>808</td>
				<td colspan=2>809</td>
				<td colspan=2>810</td>
				<td colspan=2>811</td>
				<td colspan=2>812</td>
				<td colspan=2>813</td>
				<td colspan=2>814</td>
				<td colspan=2>815</td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=1></td>
				<td colspan=2>901</td>
				<td colspan=2>902</td>
				<td colspan=2>903</td>
				<td colspan=2>904</td>
				<td colspan=2>905</td>
				<td colspan=2>906</td>
				<td colspan=2>907</td>
				<td colspan=2>908</td>
				<td colspan=2>909</td>
				<td colspan=2>910</td>
				<td colspan=2>911</td>
				<td colspan=2>912</td>
				<td colspan=2>913</td>
				<td colspan=2>914</td>
				<td colspan=1></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=2></td>
				<td colspan=2>1001</td>
				<td colspan=2>1002</td>
				<td colspan=2>1003</td>
				<td colspan=2>1004</td>
				<td colspan=2>1005</td>
				<td colspan=2>1006</td>
				<td colspan=2>1007</td>
				<td colspan=2>1008</td>
				<td colspan=2>1009</td>
				<td colspan=2>1010</td>
				<td colspan=2>1011</td>
				<td colspan=2>1012</td>
				<td colspan=2>1013</td>
				<td colspan=2></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=3></td>
				<td colspan=2>1101</td>
				<td colspan=2>1102</td>
				<td colspan=2>1103</td>
				<td colspan=2>1104</td>
				<td colspan=2>1105</td>
				<td colspan=2>1106</td>
				<td colspan=2>1107</td>
				<td colspan=2>1108</td>
				<td colspan=2>1109</td>
				<td colspan=2>1110</td>
				<td colspan=2>1111</td>
				<td colspan=2>1112</td>
				<td colspan=3</td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=4></td>
				<td colspan=2>1201</td>
				<td colspan=2>1202</td>
				<td colspan=2>1203</td>
				<td colspan=2>1204</td>
				<td colspan=2>1205</td>
				<td colspan=2>1206</td>
				<td colspan=2>1207</td>
				<td colspan=2>1208</td>
				<td colspan=2>1209</td>
				<td colspan=2>1210</td>
				<td colspan=2>1211</td>
				<td colspan=4></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=5></td>
				<td colspan=2>1301</td>
				<td colspan=2>1302</td>
				<td colspan=2>1303</td>
				<td colspan=2>1304</td>
				<td colspan=2>1305</td>
				<td colspan=2>1306</td>
				<td colspan=2>1307</td>
				<td colspan=2>1308</td>
				<td colspan=2>1309</td>
				<td colspan=2>1310</td>
				<td colspan=5></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=6></td>
				<td colspan=2>1401</td>
				<td colspan=2>1402</td>
				<td colspan=2>1403</td>
				<td colspan=2>1404</td>
				<td colspan=2>1405</td>
				<td colspan=2>1406</td>
				<td colspan=2>1407</td>
				<td colspan=2>1408</td>
				<td colspan=2>1409</td>
				<td colspan=6></td>
			</tr>
			<tr align='center' valign='center'>
				<td colspan=7></td>
				<td colspan=2>1501</td>
				<td colspan=2>1502</td>
				<td colspan=2>1503</td>
				<td colspan=2>1504</td>
				<td colspan=2>1505</td>
				<td colspan=2>1506</td>
				<td colspan=2>1507</td>
				<td colspan=2>1508</td>
				<td colspan=7></td>
			</tr> -->
			<tr align='center' valign='center'>
				<td colspan=34></td>
			</tr>
		</table>
	</main>
</body>

</html>
