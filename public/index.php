<?php
    include "../part/head.php";

    // 전화 연결
$dbConn = mysqli_connect("localhost", "root", "", "site", 3306) or die("DB CONNECTION ERROR");

// 할말 적기, 최근 게시글 불러오기
$sql = "
    SELECT *
    FROM article   
    ORDER BY ID DESC
    limit 3;    
";
$rs = mysqli_query($dbConn, $sql);

$articleRows = [];
while (true){
    $row = mysqli_fetch_assoc($rs);
    if ($row == null){
        break;
    }
    $articleRows[] = $row;
}

$sql = "
    SELECT *
    FROM cateItem 
    ORDER BY id;
";

$rs = mysqli_query($dbConn, $sql);
$category = [];

while (true){
    $row = mysqli_fetch_assoc($rs);
    if ($row == null){
        break;
    }
    $category[] = $row;
}


?>

<section id="contents">
    <div class="section main con-max-width margin-0-auto flex flex-d-c relative">
        <div class="char-wrap">
            <div class="char-text-wrap margin-0-auto">
                <div class="char-text-body sehyun noselect flex flex-jc-c flex-ai-c">
                    <span>Hello world!</span>
                </div>
                <div class="char-text-tri"></div>
            </div>
            <div class="char">
                <img class="margin-0-auto noselect" src="https://kimbangul.github.io/img1/blog/common/bangul_main.gif" alt="bangul">
            </div>
        </div>
        <div class="main-title sehyun noselect">
            <span class="bold">KIMBANGUL</span> BLOG
            <br>
            <span class="light">Scroll down to view recent articles</span>
        </div>
        <div class="direction-icon flex flex-jc-c">
            <i class="fas fa-angle-double-down"></i>
        </div>
    </div>

    <div class="section recent-article">
        <div class="section-title  sehyun noselect">Recent Articles</div>

        <div class="article-box con sans con-max-width margin-0-auto">

            <?php
            if(empty($articleRows)){
        
                ?>
            <div class="con" style="text-align:center">
                게시물이 존재하지 않습니다.
            </div>
            <?php
  }  else{ ?>

            <ul>
                <?php foreach ($articleRows as $article){?>
                <li class="margin-0-auto"><a class="flex flex-jc-c margin-0-auto" href="/detail.php?id=<?=$article['id']?>">
                        <div class="thumbnail"><img src="<?=$article['thumbImgUrl']?>" alt="thumbnail"></div>


                        <div class="article">
                            <div class="article-title"><?=$article['title']?></div>
                            <div class="article-summary">

                            <?php
                            if (empty($article['summary'])){                                
                            ?>
                            <?=$article['body']?>
                            <?php
                            } else{
                            ?>

                            <?=$article['summary']?>
                            <?php } ?>
                            <span class="view">Read more <i class="fas fa-angle-right"></i></span>
                        </div>
                       
                        </div>
                    </a></li>
                <?php } ?>
            </ul>

                <?php } ?>
        </div>
    </div>




    <?php
    include "../part/foot.php";
?>