<?php
/* 内部文字エンコーディングをUTF-8に設定 */
mb_internal_encoding("UTF-8");

/**
* ベーシック認証をかける
*
* @param array $auth_list ユーザー情報(複数ユーザー可) array("ユーザ名" => "パスワード") の形式
* @param string $realm レルム文字列
* @param string $failed_text 認証失敗時のエラーメッセージ
*/
function basic_auth($auth_list,$realm="Restricted Area",$failed_text="Authentication Faild"){
    if (isset($_SERVER['PHP_AUTH_USER']) and isset($auth_list[$_SERVER['PHP_AUTH_USER']])){
        if ($auth_list[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW']){
            return $_SERVER['PHP_AUTH_USER'];
        }
    }

    header('WWW-Authenticate: Basic realm="'.$realm.'"');
    header('HTTP/1.0 401 Unauthorized');
    header('Content-type: text/html; charset=UTF-8');

    die($failed_text);
}

$users = array(
    'user' => 'pass',
    'd_ojima' => 'hogehoge123#',
    'arobaview' => 'arobaview',
    'testuser' => 'teste123#',
    'root' => 'pass'
 );


//ベーシック認証をかける
basic_auth($users);

echo "Authentication OK";
echo 'ほげ';
