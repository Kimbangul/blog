<?php
// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';


$pageTitle = '관리자 메인';

// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';
?>

<div class="con">성공
</div>


<div class="con"><a href="/adm/member/doLogout.php">로그아웃</a></div> 

<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';
// 웹 루트의 경로를 담고 있음
// require_once: include와 다르게 대상 파일이 없으면 실행되지 않음.

