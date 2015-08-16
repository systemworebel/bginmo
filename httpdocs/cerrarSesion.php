<?php
session_start();
unset($_SESSION['correo']);
unset($_SESSION['contrasena']);
session_destroy();
header('Location: http://localhost/bginmo/httpdocs/ingreso.html');
?>