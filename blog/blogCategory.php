<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $category = $_GET['category'];

    $categorySql = "SELECT * FROM hyunBlog WHERE blogDelete = 0 AND blogCategory = '$category' ORDER BY blogID DESC LIMIT 10";
    $categoryResult = $connect -> query($categorySql);
    $categoryInfo = $categoryResult -> fetch_array(MYSQLI_ASSOC);
    $categoryCount = $categoryResult -> num_rows;
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
            <h2><?=$categoryInfo['blogCategory']?>블로그</h2>
            <p><?=$categoryInfo['blogCategory']?>와 관련된 글이<?=$categoryCount?>개 있습니다.</p>
            <div class="blog__inner">
                <div class="blog__contents">
                    <article class="card__wrap">


                        <div class="card__pages">
                            <ul>
                                <li><a href="#">&lt;&lt;</a></li>
                                <li><a href="#">&lt;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">&gt;</a></li>
                                <li><a href="#">&gt;&gt;</a></li>
                            </ul>
                        </div>
                    </article>
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
            </div>
        </section>
        
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->

</body>

</html>
