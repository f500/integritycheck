#!/usr/bin/env php
<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/vendor/autoload.php";

$simple = new SimpleIntegrityCheck();
$investigation = $simple->investigate();

foreach ($investigation->allErrors() as $error) {
    echo $error . "\n";
}

$resolution = $simple->resolve();

echo $resolution->getMessage() . "\n";
