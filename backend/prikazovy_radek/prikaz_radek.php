<?php
ob_start(); // Nahození bufferingu

$command = isset($_GET['command']) ? $_GET['command'] : null;

if ($command === '/pomoc') {
    echo "Známé příkazy: /pomoc; /session restart; /clear";
} elseif ($command === '/test2') {
    echo "Test 2";
}
elseif ($command === '/session restart') {
    // Restartuje session
    session_start();
    session_unset();
    session_destroy();
    echo "Session byla úspěšně restartována";
}

elseif ($command === '/clear') {
    // Clear prikazoveho radku
    echo '<script> var output = document.getElementById("output"); if (output) { output.innerHTML = ""; } </script>';
}  else {
    echo "Neznámý příkaz. Zkuste použít příkaz /pomoc.";
}


// Zachycení outputu a decode
$output = ob_get_clean();
echo $output;
?>
