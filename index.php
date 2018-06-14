<?php 
session_start();
include('action/verificarSession.php');

echo 'aaa';
echo "<a href='action/sessionDestroy.php'>Cerrar Sesión</a>";
?>