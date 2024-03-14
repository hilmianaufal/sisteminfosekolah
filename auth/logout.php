<?php

session_start();

session_unset();

$_SESSION = [];


header("Location: login.php");

exit;