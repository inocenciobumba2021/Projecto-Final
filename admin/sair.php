<?php
session_destroy();
unset($_SESSION['idUsuario']);
header("location: ../index.php");
?>