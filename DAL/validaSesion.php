<?php
session_start();
if ($_SESSION['login'] != true) header("Location: logueo.php");