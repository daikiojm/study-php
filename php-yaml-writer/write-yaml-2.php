<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$array = array(
    'y_kobayashi' => array(
        'Name' => '小林さん',
        'Basic' => array(
            'user' => 'bbbbbbbj',
            'pass' => 'pppppppj'
        )
    )
);

$yaml = Yaml::dump($array, 3);
// Additional writing
file_put_contents('output.yaml', $yaml, FILE_APPEND);
// file_put_contents('output.yaml', $emptyLine, FILE_APPEND);
