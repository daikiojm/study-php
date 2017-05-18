<?php
require_once "Spyc.php";
$fruits = Spyc::YAMLLoad('test.yaml');
var_dump($fruits);
echo json_encode($fruits);
