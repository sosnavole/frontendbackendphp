<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="TVUJ PROBLEM KAMO">
	<title>ezPWNED FileVault</title>
	<link rel="stylesheet" type="text/css" href="landpage.css">
</head>
<body>

<?php
//PHP script na check jestli parametr v session loggedin==true
session_start();

//PHP script na check jestli parametr v session loggedin==true
// Uzivatel nema zaznamenanou session, forward na index.php (login stranka)
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../../index.php");
    exit();
}

// Uzivatel prihlasen, kontent zustava

?>


<div class="box">

			<h1>Administrator panel ezPWNED</h1>
			    <div class="login2">
			    <div class="container">
        			<h2>Zastavení a vymazání session</h2>
        				<p class="center">Vymaže aktuální session pomocí <span style="font-style: italic;">session_destroy()</span> a vytvoří novou pomocí <span style="font-style: italic;">session_start()</span>.</p>
        				<p class="center">Tím dojde k odhlášení uživatele.</p>
        				<form action="../../backend/restore_session/restore_session.php" method="post">
            			<input type="submit" name="submit" value="Rozjebat session jak salát">
            		</form>
            	</div>
<?php
if(isset($_GET['msg'])) {
  echo '<div class="success-message">Session restartována</div>';
}
?>
						</form>
		</div>
	</div>

<div class="box2">
		<div class="container">
        			<h2>Příkazový řádek <span style="color: rgb(20, 133, 20);">[LIVE]</span>.</h2>
        </div>
<div class="box1">
	<div class="container">
    <p class="center">Zadejte příkaz do příkazového řádku. PHP Handler <span class="prefix">SosnaMaster</span> ho zpracuje.</p>
   	<div id="console">
  	<div id="output"></div>
 	<div id="prompt">
    <span class="prefix">Příkaz:</span>
    <input type="text" id="input" autocomplete="off" spellcheck="false">
  </div>
</div>
    </div>
    <script>
        // Nastaví příkazový řádek
        var cli = document.getElementById('cli');
        var output = document.getElementById('output');
        var input = document.getElementById('input');
        var prompt = document.getElementById('prompt');
        input.addEventListener('keydown', function(e) {
            if (e.keyCode === 13) { // zaznamenán enter
                var command = input.value.trim();
                input.value = '';
                output.innerHTML += '<span class="prefix">SosnaMaster:</span> ' + command + '<br>';
                // Odešle příkaz do backendu k processu
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            output.innerHTML += xhr.responseText + '<br>';
                        } else {
                            output.innerHTML += 'Error: ' + xhr.status + '<br>';
                        }
                    }
                };
                xhr.open('GET', '../../backend/prikazovy_radek/prikaz_radek.php?command=' + encodeURIComponent(command));
                xhr.send();
            }
        });
        input.focus();
    </script>
    </div>

</body>
</html>