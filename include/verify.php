<?php

if($_SESSION['user'] != 'admin'){
    header('location: login.php');
}