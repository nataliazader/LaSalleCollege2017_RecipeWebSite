<?php
SESSION_start();
SESSION_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>