<?php
$config = [];
$config['needToLogin'] = false;

// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = '게시판 생성';
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';
?>

<form class="con table-box form1" action="doMake.php" method="POST">
    <table>
        <colgroup>
            <col width="300">
        </colgroup>
        <tbody>
            <tr>
                <th>이름</th>
                <td>
                    <div class="form-control">
                        <input name="name" type="text" maxlength="20" placeholder="이름을 입력해주세요." required autofocus>
                    </div>
                </td>
            </tr>
            <tr>
                <th>코드</th>
                <td>
                    <div class="form-control">
                        <input name="code" type="text" maxlength="20" placeholder="코드를 입력해주세요." required>
                    </div>
                </td>
            </tr>
            <tr>
                <th>생성</th>
                <td>
                    <div class="form-control">
                        <button type="submit" class="btn btn-primary">생성</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';