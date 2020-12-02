<?php

$pdo = new PDO('mysql:host=localhost:3306;dbname=poll','root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

session_start();

require "Controller/Controller.php";

?>