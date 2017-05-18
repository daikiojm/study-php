<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$array = array(
  'foo' => 'bar',
  'bar' => array(
    'foo' => 'bar',
    'bar' => 'hooo')
  );

$yaml = Yaml::dump($array);

// file_put_contents('output.yaml', $yaml);
file_put_contents('output.yaml', $yaml, FILE_APPEND);
