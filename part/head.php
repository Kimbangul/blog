<?php
// 전화 연결
$dbConn =  mysqli_connect("site102.blog.oa.gg", "site102", "sbs123414", "site102", 3306);
mysqli_query($dbConn, "SET NAMES utf8mb4;");
// 인코딩

//  3	Bangul
//  2	Illust
//  1	Web Design

// 전화연결이 성공했다면 이 부분 싱행

// if ( isset($_GET['cateItemId']) == false){
//     $_GET['cateItemId'] = 1;
// }
// $cateItemId = $_GET['cateItemId'];



// 상대방에게 할말 적기
$sql = "
  SELECT *
  FROM cateItem
  ORDER BY ID 
";

$rs = mysqli_query($dbConn, $sql); 
//   쿼리 실행
//  $row = mysqli_fetch_assoc($rs);
//   압축 해....제?
// $cateItemName = $row['name'];

$cateRows = [];
while (true){
    $row = mysqli_fetch_assoc($rs);

    if ($row == null){
        break;
    }

    $cateRows[] = $row;
}

 
// $sql = "
//     SELECT *
//     FROM article
//     WHERE cateItemId = '{$cateItemId}'
//     ORDER BY ID DESC    
// ";


// $rs = mysqli_query($dbConn, $sql);

// $articleRows = [];
// while (true){
//     $row = mysqli_fetch_assoc($rs);
//     if ($row == null){
//         break;
//     }
//     $articleRows[] = $row;
// }


?>


<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awesome 로드 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!--  폰트 로드 -->
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&family=Noto+Serif+KR:wght@200;300;400;500;600;700;900&display=swap"
        rel="stylesheet">

    <!-- jquery 로드 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- fullpage -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css">


    <link rel="stylesheet" href="resource/common.css">
    <script src="resource/common.js"></script>

    <title>Kimbangul</title>
</head>

<body>

<div id="wrap">
    <header class="con">
        <nav class="con-max-width margin-0-auto flex flex-jc-b">
            <div class="logo flex"><a class="flex flex-ai-c" href="/">
                    <img src="https://kimbangul.github.io/img1/blog/common/logo.png" alt="">
                </a></div>
            <div class="menu slideOpenClose flex"><a class="flex flex-ai-c" href="#">
                    <div class="menu-btn ">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a></div>
        </nav>
        <div class="slide-nav-wrap">
            <nav class="slide-nav flex flex-jc-c flex-ai-c  noselect">
                <div class="close_btn slideOpenClose">
                    <!-- <i class="fas fa-times"></i> -->
                    <a class="flex flex-ai-c" href="#">
                    <div class="menu-btn ">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                </div>
                <div class="logo"><a class="flex flex-ai-c" href="/">
                    <img src="https://kimbangul.github.io/img1/blog/common/logo.png" alt=""></div>
                <ul class="menu-item sehyun">

                    <li><a href="/">HOME</a></li>

                    <li>CATEGORY
                        <ul class="submenu">
                        <?php foreach ($cateRows as $cateItem){?>
        <li>
           <a href="/list.php?cateItemId=<?=$cateItem['id']?>"><?=$cateItem['name']?></a>
        </li>

        <?php
}    
?>

                            
                        </ul>
                    </li>
                </ul>

                <ul class="social flex flex-jc-c">
        <li><a target="_blank" href="https://www.instagram.com/y_e_r_i_m_e/"><i class="fab fa-instagram"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/kim_bang_ul"><i class="fab fa-twitter"></i></a></li>
        <li><a target="_blank" href="https://github.com/Kimbangul"><i class="fab fa-github"></i></a></li>
        </ul>
            </nav>
        </div>
    </header>