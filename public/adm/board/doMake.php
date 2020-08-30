<?php
$config = [];
$config['needToLogin'] = false;

// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$board = ArticleService::getBoardByCode($_REQUEST['code']);

if ( $board ) {
    jsAlert("이미 존재하는 게시판 코드 입니다.");
    jsHistoryBack();
}

ArticleService::makeBoard($_REQUEST);

jsAlert("{$_REQUEST['name']} 게시판이 생성되었습니다.");
jsLocationReplace("/adm/board/list.php");