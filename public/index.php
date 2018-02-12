<?php
session_start();
define("BASEPATH",__DIR__.'/../');
require "../App/Bootstrap/autoload.php";
\Bootstrap\App::run();
