<?php
session_start();
$_SESSION= array();
session_destroy();
session_write_close();
header('Location: ../index.php'); // will be set to index on login imp
?>
