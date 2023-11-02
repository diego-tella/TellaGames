<?php
session_start();
session_destroy();
header('location: /TellaGames/index.php');
?>