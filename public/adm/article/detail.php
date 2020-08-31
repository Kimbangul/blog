<?php
$config = [];
$config['needToLogin'] = false;

// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = '게시물 수정';
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';

$boards = ArticleService::getForPrintBoards();
$article = ArticleService::getArticleById($_REQUEST['id']);
$displayStatusNames = ArticleService::getDisplayStatusNames();

require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/toastUiEditor.php';
?>

<div class="con table-box">
    <table>
        <colgroup>
            <col width="300">
        </colgroup>
        <tbody>
            <tr>
                <th>노출여부</th>
                <td>
                    <?=ArticleService::getDisplayStatusName($article['displayStatus'])?>
                </td>
            </tr>
            <tr>
                <th>게시판</th>
                <td>
                    <?=ArticleService::getBoardName($article['boardId'], $boards)?>
                </td>
            </tr>
            <tr>
                <th>제목</th>
                <td>
                    <?=$article['title']?>
                </td>
            </tr>
            <tr>
                <th>썸네일 이미지 url</th>
                <td>
                    <?=$article['thumbImgUrl']?>
                </td>
            </tr>
            <tr>
                <th>요약</th>
                <td>
                    <?=$article['summary']?>
                </td>
            </tr>
            <tr>
                <th>본문</th>
                <td>
                    <script type="text/x-template"><?=$article['body']?></script>
                    <div class="toast-editor toast-editor-viewer"></div>
                </td>
            </tr>
            <tr>
                <th>비고</th>
                <td>
                    <div class="form-control">
                        <a href="/adm/article/modify.php?id=<?=$article['id']?>" class="btn btn-primary">수정</a>
                        <a onclick="if ( confirm('정말 삭제 하시겠습니까?') == false ) return false;" href="/adm/article/doDelete.php?id=<?=$article['id']?>" class="btn btn-danger">삭제</a>
                        <a href="#" onclick="history.back(); return false;" class="btn btn-info">뒤로가기</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';