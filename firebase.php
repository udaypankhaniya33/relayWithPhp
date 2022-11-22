<?php

include __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;


$factory = (new Factory())
    ->withDatabaseUri('https://relay-9e0a3-default-rtdb.firebaseio.com');
$database = $firebase->getDatabase();

print_r($factory);exit;