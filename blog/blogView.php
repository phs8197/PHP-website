<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $blogID = $_GET['blogID'];

    $blogSql = "SELECT * FROM hyunBlog WHERE blogID = '$blogID'";
    $blogResult = $connect -> query($blogSql);
    $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 사이트 만들기</title>

    <?php include "../include/head.php" ?>
</head>

<body>

    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main">
        <section id="blog" class="container section">
            <div class="blog__inner">
                <div class="blog__title" style="background-image:url(../assets/img/blog/<?=$blogInfo['blogImgFile']?>)">
                    <span class="cate"><?=$blogInfo['blogTitle']?></span>
                    <h3 class="title"><?=$blogInfo['blogCategory']?></h3>
                    <div class="info">
                        <span><?=$blogInfo['blogAuthor']?></span>
                        <span><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span>
                        <div class="modify">
                            <span>수정</span>
                            <span>삭제</span>
                        </div>
                    </div>
                </div>
                <div class="blog__contents">
                <?=$blogInfo['blogContents']?>
                </div>  
                <div class="blog__aside">
                    <div class="aside__intro">
                        <div class="img">
                            <img src="assets/img/banner_bg01.jpg" alt="배너 이미지">
                        </div>
                        <div class="desc">
                            어떤 일이라도 <em>노력</em>하고 즐기면 그 결과는 <em>빛</em>을 바란다고 생각합니다.
                        </div>
                    </div>
                    <article class="aside__cate">
                        <h3>카테고리</h3>
                        <?php include "../include/category.php"?>
                    </article>
                    <article class="aside__cate">
                        <h3>최신 글</h3>
                        <!-- <?php include "../include/newBlog.php"?> -->
                    </article>
                    <article class="aside__cate">
                        <h3>인기 글</h3>
                        <!-- <?php include "../include/popBlog.php"?> -->
                    </article>
                    <article class="aside__cate">
                        <h3>최신 댓글</h3>
                        <!-- <?php include "../include/newComment.php"?> -->
                    </article>
                </div>
                <div class="blog__article">
                    <h3>관련글</h3>
                    <article class="card__wrap">
                        <div class="card__inner">
                            <div>
                                <figure>
                                    <img src="assets/img/card_bg01.jpg" alt="vscode에 scss설치하기">
                                    <a href="blogView.html" class="go" title="컨텐츠 바로가기">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.646447 8.64645C0.451184 8.84171 0.451184 9.15829 0.646447 9.35355C0.841709 9.54882 1.15829 9.54882 1.35355 9.35355L0.646447 8.64645ZM9.5 1C9.5 0.723858 9.27614 0.5 9 0.5L4.5 0.5C4.22386 0.5 4 0.723858 4 1C4 1.27614 4.22386 1.5 4.5 1.5L8.5 1.5L8.5 5.5C8.5 5.77614 8.72386 6 9 6C9.27614 6 9.5 5.77614 9.5 5.5L9.5 1ZM1.35355 9.35355L9.35355 1.35355L8.64645 0.646447L0.646447 8.64645L1.35355 9.35355Z" fill="white"/>
                                        </svg>
                                    </a>
                                </figure>
                                <div>
                                    <h3>vscode에 scss설치하기</h3>
                                    <p>먼저 확장 프로그램에서 scss를 설치합니다. sass와 scss는 같지만 쓰는 방법이 살짝 틀립니다.</p>
                                </div>
                            </div>
                            <div>
                                <figure>
                                    <img src="assets/img/card_bg02.jpg" alt="vscode에 scss설치하기">
                                    <a href="blogView.html" class="go" title="컨텐츠 바로가기">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.646447 8.64645C0.451184 8.84171 0.451184 9.15829 0.646447 9.35355C0.841709 9.54882 1.15829 9.54882 1.35355 9.35355L0.646447 8.64645ZM9.5 1C9.5 0.723858 9.27614 0.5 9 0.5L4.5 0.5C4.22386 0.5 4 0.723858 4 1C4 1.27614 4.22386 1.5 4.5 1.5L8.5 1.5L8.5 5.5C8.5 5.77614 8.72386 6 9 6C9.27614 6 9.5 5.77614 9.5 5.5L9.5 1ZM1.35355 9.35355L9.35355 1.35355L8.64645 0.646447L0.646447 8.64645L1.35355 9.35355Z" fill="white"/>
                                        </svg>
                                    </a>
                                </figure>
                                <div>
                                    <h3>vscode에 scss설치하기</h3>
                                    <p>먼저 확장 프로그램에서 scss를 설치합니다. sass와 scss는 같지만 쓰는 방법이 살짝 틀립니다.</p>
                                </div>
                            </div>
                            <div>
                                <figure>
                                    <img src="assets/img/card_bg03.jpg" alt="vscode에 scss설치하기">
                                    <a href="blogView.html" class="go" title="컨텐츠 바로가기">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.646447 8.64645C0.451184 8.84171 0.451184 9.15829 0.646447 9.35355C0.841709 9.54882 1.15829 9.54882 1.35355 9.35355L0.646447 8.64645ZM9.5 1C9.5 0.723858 9.27614 0.5 9 0.5L4.5 0.5C4.22386 0.5 4 0.723858 4 1C4 1.27614 4.22386 1.5 4.5 1.5L8.5 1.5L8.5 5.5C8.5 5.77614 8.72386 6 9 6C9.27614 6 9.5 5.77614 9.5 5.5L9.5 1ZM1.35355 9.35355L9.35355 1.35355L8.64645 0.646447L0.646447 8.64645L1.35355 9.35355Z" fill="white"/>
                                        </svg>
                                    </a>
                                </figure>
                                <div>
                                    <h3>vscode에 scss설치하기</h3>
                                    <p>먼저 확장 프로그램에서 scss를 설치합니다. sass와 scss는 같지만 쓰는 방법이 살짝 틀립니다.</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        
    </main>
    <!-- //main -->
<!-- main -->
w
    <?php include "../include/footer.php" ?>
    <!-- //footer -->

</body>

</html>
