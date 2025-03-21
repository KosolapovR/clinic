<?php

//Paths:

define("CORE", ROOT . "/core");
define("VIEWS", ROOT . "/views");
define("MODELS", ROOT . "/models");
define("CONTROLLERS", ROOT . "/controllers");
define("CONFIG", ROOT . "/config");
define("CLASSES", ROOT . "/classes");
define("LOGS", ROOT . "/logs");

//Database:

define("DSN", "mysql:host=blog.loc;dbname=blog");
define("DB_USER", "root");
define("DB_PASS", "");

//require_once  CORE . '/DBconnect.php';
require_once  ROOT . '/vendor/autoload.php';
require_once  CORE . '/functions.php';

define("SECRET_WORD", "akuna matata");

