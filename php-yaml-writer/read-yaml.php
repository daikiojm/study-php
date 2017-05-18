<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$value = Yaml::parse(file_get_contents('input.yaml'));
var_dump($value);
