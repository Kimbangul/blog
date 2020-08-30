<?php
$config = [];
$config['needToLogin'] = false;


// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';


$pageTitle = '로그인';

// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';
?>

<form class="con table-box form1" action="doLogin.php" method="POST">
    <table>
        <colgroup>
            <col sidth = "300">
        </colgroup>
        <tbody>
            <tr>
                <th>로그인 아이디</th>
                <td>
                    <div class="form-control">
                        <input name="loginId" type="text" maxlength="20" placeholder="로그인 아이디를 입력해주세요." required autofocus>
                    </div>
                </td>
            </tr>

            <tr>
                <th>로그인 비번</th>
                <td>
                    <div class="form-control">
                        <input name="loginPw" type="password" maxlength="20" placeholder="로그인 비번을 입력해주세요." required>
                    </div>
                </td>
            </tr>

            <tr>
                <th>로그인</th>
                <td>
                    <div class="form-control">
                        <button type="submit" class="btn btn-primary">로그인</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';
// 웹 루트의 경로를 담고 있음
// require_once: include와 다르게 대상 파일이 없으면 실행되지 않음.

