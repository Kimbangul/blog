<?php

$dbConn =  mysqli_connect("site102.blog.oa.gg", "site102", "sbs123414", "site102", 3306);
mysqli_query($dbConn, "SET NAMES utf8mb4;");

$sql = "
  SELECT *
  FROM board
  ORDER BY ID 
";

$rs = mysqli_query($dbConn, $sql); 

$boardRows = [];
while (true){
    $row = mysqli_fetch_assoc($rs);

    if ($row == null){
        break;
    }

    $boardRows[] = $row;
}


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

    <!-- scrollmagic 로드 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>

    <link rel="stylesheet" href="resource/common.css">
    <script src="resource/common.js"></script>

    <title>KIMBANGUL Blog</title>
</head>

<body>
    <header id="header" class="flex flex-ai-c flex-jc-c">
        <nav class="con-max-width con-padding flex flex-jc-b flex-ai-c">

            <div class="cate-menu flex flex-1-0-0 flex-ai-c">
                <div class="menu-btn ">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
               <span class="pc bold">category</span> 
            </div>

            <div class="logo  flex-jc-c  flex-1-0-0 ">
                <a class="flex flex-jc-c flex-ai-c" href="/"><img class="normal" src="resource/img/logo.png" alt="logo">
                <img class="hover" src="resource/img/logo_hover.png" alt="logo_hover">
            </a>
            </div>

            <ul class="social flex flex-1-0-0 flex-jc-e pc">
                <li><a target="_blank" href="https://www.instagram.com/y_e_r_i_m_e/"><i
                            class="fab fa-instagram"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/kim_bang_ul"><i class="fab fa-twitter"></i></a></li>
                <li><a target="_blank" href="https://github.com/Kimbangul"><i class="fab fa-github"></i></a></li>
            </ul>


        </nav>
        <div id="slide-menu-wrap">
            <div class="slide-menu-body flex flex-ai-c">

                <div class="close-btn">
                    <div class="close-btn-wrap">
                    <span></span><span></span>
                    </div>
                    
                </div>
                 <div class="con  flex flex-jc-b">
                 <div class="logo flex flex-jc-c">
                    <a href="/"><img class="normal" src="resource/img/logo.png" alt="logo"></a>                    
                </div>

                <ul class="cate-menu ">
                    <li><a href="/">HOME</a></li>
                    <li>Category
                        <ul class="submenu">
                        <?php foreach ($boardRows as $boardItem){?>
                            <li>
                             <a href="/list.php?boardId=<?=$boardItem['id']?>"><?=$boardItem['name']?></a>
                         </li>
                           <?php
                                }    
                            ?>
                        </ul>
                    </li>
                </ul>


                <ul class="social flex flex-jc-c">
                    <li><a target="_blank" href="https://www.instagram.com/y_e_r_i_m_e/"><i
                            class="fab fa-instagram"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/kim_bang_ul"><i class="fab fa-twitter"></i></a></li>
                    <li><a target="_blank" href="https://github.com/Kimbangul"><i class="fab fa-github"></i></a></li>
                </ul>

                 </div>



            </div>
            <div class="slide-menu-bg"></div>
        </div>
    </header>