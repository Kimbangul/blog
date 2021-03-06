<?php

include "../part/head.php";

    
    $articleRows = ArticleService::getArticleAllPublic();      

    $_REQUEST['displayStatus'] = '__ALL__';
    $listData = ArticleService::getForPrintListDataPublicAll($_REQUEST);
    $articles = $listData['articles'];
    $totalPage = $listData['totalPage'];
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
            <i class="fas fa-fish"></i>  All articles <i class="fas fa-fish"></i>
            </h2>
            <div class="article-box-wrap flex">
            
            <?php
            if(empty($articles)){
        
                ?>
            <div class="con namsan no-article" style="text-align:center;">
                게시물이 존재하지 않습니다.
            </div>
            <?php
            }  else{ 
                 foreach ($articles as $article){?>
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
    <div class="con-max-width search-box">
        <form class="form1 flex flex-ai-c flex-jc-c">
        <i class="fas fa-search icon"></i>    
        <div class="form-control">
             <input type="text" name="title" placeholder="제목을 입력하세요!" value="<?=getArrValue($_REQUEST, 'title', '')?>">
          </div>
        </form>
    
     </div>

    <div class="con-max-width sans count-box flex flex-jc-c">
    <?php for ( $i = 1; $i <= $totalPage; $i++ ) { ?>
        <a class="count flex flex-ai-c flex-jc-c" href="<?=getNewUri($_SERVER['REQUEST_URI'], 'page', $i)?>"><?=$i?></a>
    <?php } ?>
    </div>

</section>




<?php

include "../part/foot.php";

?>