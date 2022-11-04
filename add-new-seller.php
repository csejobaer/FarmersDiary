
<?php
session_start();
unset($_SESSION['onceTime']);
header('Location: deshboard.php');
?>