<?php
    include "../part/head.php";
    // ../ -> 부모(상위) 폴더로

    // 전화 연결
$dbConn = mysqli_connect("site102.blog.oa.gg", "site102", "sbs123414", "site102", 3306);

//  3	Bangul
//  2	Illust
//  1	Web Design

// 전화연결이 성공했다면 이 부분 싱행

if ( isset($_GET['boardId']) == false){
    $_GET['boardId'] = 1;
}
$boardId = $_GET['boardId'];



// 상대방에게 할말 적기
$sql = "
  SELECT `name`
  FROM board
  WHERE id = '{$boardId}';
";

$rs = mysqli_query($dbConn, $sql); 
//   쿼리 실행
 $row = mysqli_fetch_assoc($rs);
//   압축 해....제?
$boardName = $row['name'];
 
$sql = "
    SELECT *
    FROM article
    WHERE boardId = '{$boardId}' AND displayStatus = 1 AND delstatus = 0
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

<section id="contents">

<div id="main">
        <div class="con cate-item-name-box con-max-width">
            <div class="text-box cate-item-name sans noselect">
            <?=$boardName?>
            </div>

            <div class="img-box-wrap flex">
                <div class="img-box noselect">
                    <img src="resource/img/bangul.png" alt="bangul">
                </div>
                <div class="img-box noselect pc">
                    <img src="resource/img/bangul.png" alt="bangul">
                </div>
                <div class="img-box noselect pc">
                    <img src="resource/img/bangul.png" alt="bangul">
                </div>
            </div>

        </div>
    </div>


    <div class="list con-max-width con-padding margin-0-auto">

    <div class="article-box-wrap flex ">
            
            <?php
            if(empty($articleRows)){
        
                ?>
            <div class="con no-article namsan" style="text-align:center;">
                게시물이 존재하지 않습니다.
            </div>
            <?php
            }  else{ 
                 foreach ($articleRows as $article){?>
            <a class="article" href="/detail.php?id=<?=$article['id']?>">
                <div class="article-box flex">

                    <div class="article-thumbnail">
                        <div class="img-box">
                        <?php
                        if (empty($article['thumbImgUrl'])){?>

                        <img src="https://kimbangul.github.io/img1/blog/common/thumbimg.png" alt="thumbnail">
                        

                        <?php
                    } else{
                        ?>
                        
                        <img src="<?=$article['thumbImgUrl']?>" alt="thumbnail">

                        <?php
                        }
                        ?>
                        </div>
                    </div>

                    <div class="article-body namsan sans flex flex-jc-b">

                        <h4 class="title flex flex-ai-c"><span class="title"><?=$article['title']?></span>
                            <span class="date pc"><?=$article['regDate']?></span>
                        </h4>
                        <div class="summary flex flex-ai-c">
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
                        <div class="more flex flex-ai-c flex-jc-e">
                        <span >more</span>
                        <i class="fas fa-angle-right"></i>
                        </div>
                        


                    </div>

                </div>
            </a>

                 <?php } ?>
             <?php } ?>

           

 


            </div>
 
  
    </div>



</section>
    <?php
    include "../part/foot.php";
?>
