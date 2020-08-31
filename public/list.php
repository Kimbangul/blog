<?php
    include "../part/head.php";
    // ../ -> 부모(상위) 폴더로



if ( isset($_GET['boardId']) == false){
    $_GET['boardId'] = 1;
}
$boardId = $_GET['boardId'];

$_REQUEST['displayStatus'] = '__ALL__';
$listData = ArticleService::getForPrintListDataPublic($_REQUEST);
$articles = $listData['articles'];
$totalPage = $listData['totalPage'];


$articleRows = ArticleService::getArticleInCategoryPublic($boardId);
$board = ArticleService::getBoardById($boardId);

?>

<section id="contents">

<div id="main">
        <div class="con cate-item-name-box con-max-width">
            <div class="text-box cate-item-name sans noselect">
            <?=$board['name']?>
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
            if(empty($articles)){
        
                ?>
            <div class="con no-article namsan" style="text-align:center;">
                게시물이 존재하지 않습니다.
            </div>
            <?php
            }  else{ 
                 foreach ($articles as $article){?>
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
