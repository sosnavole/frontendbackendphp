<!-- HLAVNI INDEX ERROR STRANKY -->
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="TVUJ PROBLEM KAMO">
	<title>Error!</title>
	<link rel="stylesheet" href="errorlogin.css">
</head>
<body>
	<div class="container">
		<h1>Zadaná kombinace není správně!</h1>
		<p>Omlouváme se, ale zadaná kombinace přihlašovacích údajů se neshoduje s žádnými v databázi.</p>
		<br>
		<h2>Vaše připojení je monitorováno</h2>
		<?php
		//script na get ip z he
			if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			echo 'Vaše IP adresa: <span class="text1">' . $ip . '</span>';

			echo '<p>Vaše aktuální poloha: Momentálně nelze dohledat polohu</p>';
			
		?>
		<a href="/">Přejít zpět na přihlašovací stránku</a>
	</div>
</body>
</html>
