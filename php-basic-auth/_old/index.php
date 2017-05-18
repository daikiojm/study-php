<?php

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$users = array(
    'user' => 'pass',
    'd_ojima' => 'hogehoge123#',
    'arobaview' => 'arobaview',
    'testuser' => 'teste123#',
    'root' => 'pass'
 );

// function isUser($id) {
//     if($users[$id]) {
//         return true;
//     } else {
//         return false;
//     }
// }
//
// function isPassword($id, $pass) {
//     if ($users[$id] == $pass) {
//         return true;
//     } else {
//         return false;
//     }
// }

function Auth($id, $pass) {
    foreach ($users as $key => $value) {
            return true;
    }
    return false;
}

// Basic Authentication
// echo isPassword($user, $password);
switch (true) {
    case !isset($user, $pass):
    // case isUser($_SERVER['PHP_AUTH_USER']) !== true:
    // case isPassword($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) !== true:
    case Auth($user, $pass) !== true:
    // case isUser($user) !== true:
    // case isPassword($user, $pass) !== true:
        header('WWW-Authenticate: Basic realm="Enter username and password."');
        header('Content-Type: text/plain; charset=utf-8');
        die('このページを見るにはログインが必要です');
}

header('Content-Type: text/html; charset=utf-8');
echo 'ok';
//
// try {
//     if ($user == 'root' && $pass == 'pass') {
//         echo 'Authentication Clear';
//     } else {
//         throw new Exception("Error Processing Request", 1);
//     }
//
// } catch (Exception $e) {
//     echo 'Authentication Faild';
// }
