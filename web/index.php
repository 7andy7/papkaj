<?php
defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

if (!YII_DEBUG) {
    $urlToRedirect = $_SERVER['HTTP_HOST'];

    $serverArray = explode('.', $urlToRedirect);
    if(count($serverArray) < 3) {

            $urlToRedirect  = 'www.' . $urlToRedirect;
            $protocol       = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https://' : 'http://';

            if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']) {

                    $urlToRedirect .= $_SERVER['REQUEST_URI'];
            }

            header('Location: ' . $protocol . $urlToRedirect, true, 301);
            exit();
    }
}

$yii    = dirname(__FILE__).'/../yii/framework/yii.php';
$config = dirname(__FILE__).'/../protected/config/main.php';

require_once($yii);
Yii::createWebApplication($config)->run();
