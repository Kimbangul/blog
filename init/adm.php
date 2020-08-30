<?php
session_start();

if (isset($config) == false ){
    $config = [];
}

if (isset($config['needToLogin']) == false ){
    $config['needToLogin'] = true;
}

require_once __DIR__ . '/../config/config.php';
// __DIR__ : 현재 폴더
require_once __DIR__ . '/../lib/lib.php';
require_once __DIR__ . '/../app/app.php';

filterSqlInjection($_REQUEST);

if ($config['needToLogin'] and App::isLogined() == false){
    jsAlert('로그인 후 이용해주세요.');
    jsLocationReplace('/adm/member/login.php');
}