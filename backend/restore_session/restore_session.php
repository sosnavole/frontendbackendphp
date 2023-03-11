<?php
// PHP script na restart session

session_start();
session_unset();
session_destroy();
header("Location: ../../index.php?msg=Session%20restarted");
exit;
?>