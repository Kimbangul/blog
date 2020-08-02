<?php
    include "../part/head.php";
    // ../ -> 부모(상위) 폴더로

    // 전화 연결
$dbConn = mysqli_connect("localhost", "root", "", "site", 3306) or die("DB CONNECTION ERROR");

//  3	Bangul
//  2	Illust
//  1	Web Design

// 전화연결이 성공했다면 이 부분 싱행

if ( isset($_GET['cateItemId']) == false){
    $_GET['cateItemId'] = 1;
}
$cateItemId = $_GET['cateItemId'];



// 상대방에게 할말 적기
$sql = "
  SELECT `name`
  FROM cateItem
  WHERE id = '{$cateItemId}';
";

$rs = mysqli_query($dbConn, $sql); 
//   쿼리 실행
 $row = mysqli_fetch_assoc($rs);
//   압축 해....제?
$cateItemName = $row['name'];
 
$sql = "
    SELECT *
    FROM article
    WHERE cateItemId = '{$cateItemId}'
    ORDER BY ID DESC    
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





// http://localhost:8022/list_test.php?cateItemId=1
?>

<section id="article">


    <div class="section con-max-width margin-0-auto">
        <div class="con section-title sehyun noselect">
            <h1><?=$cateItemName?></h1>
        </div>

        <?php
    if(empty($articleRows)){
        
?>
        <div class="con" style="text-align: center;">
            게시물이 존재하지 않습니다.
        </div>
        <?php
  }  else{ ?>


        <div class="article-box list-article-box cons sans con-max-width margin-0-auto">

            <ul>
                <?php foreach ($articleRows as $article){?>
                <li class="margin-0-auto">
                    <a class="flex flex-jc-c margin-0-auto" href="./detail.php?id=<?=$article['id']?>">
                        <div class="thumbnail"><img src="<?=$article['thumbImgUrl']?>" alt="thumbnail"><br></div>

                        <div class="article">
                            <div class="article-title"> <?=$article['title']?></div>
                            <div class="article-summary">

                                <div class="article-info">

                                    번호 : <?=$article['id']?> <br>
                                    작성날짜 : <?=$article['regDate']?> <br>
                                </div>

                                <?php
                            if (empty($article['summary'])){                                
                            ?>
                                <?=$article['body']?>
                                <?php
                            } else{
                            ?>

                                <?=$article['summary']?>
                                <?php } ?>

                            </div>

                            <span class="view">Read more <i class="fas fa-angle-right"></i></span>
                        </div>





                    </a>
                </li>

                <?php
}    
?>

            </ul>


        </div>

        <?php }
?>
    </div>




    <?php
    include "../part/foot.php";
?>
