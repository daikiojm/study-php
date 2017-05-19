<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

main();

function main() {
    $fileName = 'rewritable.yaml';
    $backupFileName = getBackup($fileName);

    try {
        $data = getYamlToData($fileName);
        $searchId = 'JQXxDiNsJgWPXTZQ';
        $deleteObj = deleteObjectById($data, $searchId);
        if ($deleteObj == null) {
            echo "なかったので削除しなかった\n";
        } else {
            echo "あったので削除した\n";
            var_dump($deleteObj);
        }
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        $yamlData = Yaml::dump($data, 3);
        file_put_contents($fileName, $yamlData);
        // バックアップしたファイルを削除
        deleteFile($backupFileName);
    } catch (Exception $e) {
        // バックアップしたファイルからリストア
        restoreBackup($fileName, $backupFileName);
        printf("Error: %s", $e->getMessage());
    }

}

function deleteObjectById(&$data, $id) {
    $unsetObj = null;
    foreach ($data as $key => $value) {
        if ($key != null && $key == $id) {
            $unsetObj = $data[$key];
            unset($data[$key]);
        }
    }
    return $unsetObj;
}

function getBackup($file) {
    $bkFile = $file . '.bak';
    if (copy($file, $bkFile)) {
        return $bkFile;
    }
}

function deleteFile($file) {
    return unlink($file);
}

function restoreBackup($file, $bkFile) {
    if(file_exists($bkFile)) {
        if (copy($bkFile, $file)) {
            return true;
        }
    } else {
        return false;
    }
}

function getYamlToData($file) {
    $value = '';
    try {
        $data = file_get_contents($file);
        $convertedData = mb_convert_encoding($data, "utf-8", "auto");
        $value = Yaml::parse($convertedData);
    } catch (ParseException $e) {
        printf("Unable to parse the YAML string: %s", $e->getMessage());
    }
    return $value;
}
