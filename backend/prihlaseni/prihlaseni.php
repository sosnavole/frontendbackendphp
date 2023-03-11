<?php
// Start session
session_start();

// Kontrola jestli se uz user lognul, pokud ano forward do adminu
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // forward na main login index.php
    header("Location: ../../frontend/landpage/landpage.php");
    exit();
}

// DB pripojeni
$servername = "innodb.endora.cz";
$username = "tester1234567891";
$password = "Tester123";
$dbname = "testujemerazdva";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// kontrola pripojeni
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// kontrola pro formular
if (isset($_POST['submit'])) {
    // Vem promenny jmeno a heslo
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Zkontroluj jestli souhlasi user a pass
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // uspech login
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: ../../frontend/landpage/landpage.php");
        exit();
    } else {
        // fail login
        header("Location: ../../frontend/errorlogin/errorlogin.php");
    }
}

mysqli_close($conn);
?>
