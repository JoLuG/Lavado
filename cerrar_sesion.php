<--cerrar sesion del usuario-->
<?php
session_start();
session_destroy();
header("Location: index.html");
exit();
?>
