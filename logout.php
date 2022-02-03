<?php

session_start();
echo "Please wait! Loggin you out...";
session_unset();
session_destroy();

header("Location: home.php");
exit;

?>

