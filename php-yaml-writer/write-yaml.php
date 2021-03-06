<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$array = array(
  'foo' => 'bar',
  'bar' => array(
    'foo' => 'bar',
    'bar' => 'hooo')
  );

$emptyLine = "\n";
$yaml = Yaml::dump($array) . "\n";
// Additional writing
file_put_contents('output.yaml', $yaml, FILE_APPEND);
// file_put_contents('output.yaml', $emptyLine, FILE_APPEND);
