<?php
use App\Database;

require __DIR__.'/../vendor/autoload.php';
$config = require __DIR__.'/../config.php';

$database = new Database($config['database']);

