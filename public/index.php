<?php

include "../part/head.php";

    // 전화 연결
    $dbConn =  mysqli_connect("site102.blog.oa.gg", "site102", "sbs123414", "site102", 3306);

    // 할말 적기, 최근 게시글 불러오기
    $sql = "
        SELECT *
        FROM article   
        ORDER BY ID DESC
        limit 9;    
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
    <!-- 메인 이미지 영역 시작 -->
    <div id="main">
        <div class="con con-max-width">
            <div class="text-box sans noselect">
                WEL<br class="mb">COME!
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

    <!-- 메인 이미지 영역 끝 -->
    <!-- 최근 글 시작 -->

    <div id="recent-articles">
        <div class="con con-padding con-max-width">
            <h2 class="title namsan noselect">
            <i class="fas fa-fish"></i>  Recent articles <i class="fas fa-fish"></i>
            </h2>
            <div class="article-box-wrap flex flex-jc-c">
            
            <?php
            if(empty($articleRows)){
        
                ?>
            <div class="con namsan no-article" style="text-align:center;">
                게시물이 존재하지 않습니다.
            </div>
            <?php
            }  else{ 
                 foreach ($articleRows as $article){?>
            <a class="article" href="/detail.php?id=<?=$article['id']?>">
                <div class="article-box">

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

                    <div class="article-body namsan flex flex-jc-b">

                        <h4 class="title"><?=$article['title']?></h4>
                        <div class="summary">
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
    </div>

    <!-- 최근 글 끝 -->

</section>




<?php

include "../part/foot.php";

?>