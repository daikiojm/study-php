<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

try {
    if(!isset($_SERVER["REMOTE_ADDR"])) {
        throw new Exception("Remote addr Not Set");
    } else {
        $ip = $_SERVER["REMOTE_ADDR"];
    }
    if (!isset($_REQUEST["id"])) {
        throw new Exception("Request id Not Set");
    } else {
        $id = $_REQUEST["id"];
    }
    $user_info = get_user_info($id);
    if (!isset($user_info)) {
        throw new Exception("User Id Not Set");
    }
    basic_auth($user_info);
    ddns_main();
    exit;
} catch (Exception $e) {
    // エラーの際のステータスコードをどうするか
    // header('HTTP/1.0 401 Unauthorized');
    // header('Content-type: text/html; charset=UTF-8');
    echo $e->getMessage();
}


// idからuser:passを返す
// 無ければfalse
function get_user_info($id) {
    $result = array(
        'user' => null,
        'pass' => null
    );
    $value = Yaml::parse(file_get_contents('test.yaml'));
    if(isset($value[$id])) {
        $result['user'] = $value[$id][0];
        $result['pass'] = $value[$id][1];
        return $result;
    } else {
        return null;
    }
}

// ベーシック認証
function basic_auth($auth_user,$realm="Restricted Area",$failed_text="Authentication Faild"){
    if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
        if ($auth_user['user'] == $_SERVER['PHP_AUTH_USER'] && $auth_user['pass'] == $_SERVER['PHP_AUTH_PW']){
            return $_SERVER['PHP_AUTH_USER'];
        }
    }

    header('WWW-Authenticate: Basic realm="'.$realm.'"');
    header('HTTP/1.0 401 Unauthorized');
    header('Content-type: text/html; charset=UTF-8');

    die($failed_text);
}

// 認証通過時に実行されるメイン処理
function ddns_main() {
    // debug
    echo 'start';
    return;
}
