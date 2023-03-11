<?php
// Start session
session_start();

// Kontrola na prihlaseni, pripadne forward do adminu
//if (isset($_SESSION['username'])) {
 //   // Redirect to the homepage
   // header("Location: ../../frontend/landpage/landpage.php");
    //exit();
//}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="TVUJ PROBLEM KAMO">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div id="shapeLT"></div>
    <div id="shapeRB"></div>
    <div class="login">
        <h1>ezPWNED FileVault</h1>
        <p>Přihlaste se prosím pomocí přidělené kombinace jména a hesla.</p>

        <form action="./backend/prihlaseni/prihlaseni.php" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Přihlašovací jméno" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Heslo" id="password" required>
            <input type="submit" name="submit" value="Přihlásit se">
        </form>
    </div>
    <div class="login2">
        <h2>Zastavení a vymazání session
        <p class="center">Vymaže aktuální session pomocí <span style="font-style: italic;">session_destroy()</span> a vytvoří novou pomocí <span style="font-style: italic;">session_start()</span>.</p>
        <form action="./backend/restore_session/restore_session.php" method="post">
            <input type="submit" name="submit" value="Rozjebat session jak salát">
<?php
if(isset($_GET['msg'])) {
  echo '<div class="success-message">Session restartována</div>';
}
?>
        </form>
    </div>
    <p class="center2">Frontend HTML+CSS bez frameworku. Backend PHP bez frameworku.</p>
</body>
</html>
