<?php
define("DB_HOST", "site102.blog.oa.gg");
define("DB_ID", "site102");
define("DB_PW", "sbs123414");
define("DB_NAME", "site102");
// 함수 정의

if (!isset($config)){
    $config = [];
}




$config['dbConn'] = mysqli_connect(DB_HOST, DB_ID, DB_PW, DB_NAME) or die();
$config['siteName'] = '블로그';

?>