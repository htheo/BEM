<?php
include ('config.php');

unset($_SESSION);
unset($_COOKIE);
session_destroy();
header ('Location: index.php');
exit();
?>