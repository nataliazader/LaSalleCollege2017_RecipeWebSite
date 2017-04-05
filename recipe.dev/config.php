<?php

// Define DB Params
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "recipe");

// Define URL
$http = (isset($_SERVER['HTTPS']) ? 'https' : 'http');
$http .="://".$_SERVER['HTTP_HOST'];
define("ROOT_PATH", "/recipe.dev/");
define("ROOT_URL", $http."/recipe.dev/");