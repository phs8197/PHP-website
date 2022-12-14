<?php
    include "../connect/connect.php";
    include "../connect/session.php";
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
    <!-- //header -->

    <main id="main">
<!-- <?php
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
?> -->
        <section id="banner">
            <h2 class="blind">블로그 소개입니다.</h2>
            <div class="banner__inner container">
                <div class="img">
                    <img src="../html/assets/img/1000.JPG" alt="배너 이미지">
                </div>
                <div class="desc">
                    어떤 일이라도 <em>노력</em>하고 즐기면 그 결과는 <em>빛</em>을 바란다고 생각합니다.
                    신입의 <em>열정</em>과 <em>도전정신</em>을 깊숙히 새기며 <em>배움</em>에 있어 겸손함을
                    유지하며 세부적인 곳까지 파고드는 멋진 <em>개발자</em>가 되겠습니다.
                </div>
            </div>
        </section>
        <!-- //banner -->

        <article class="card__wrap container">
            <div class="card__inner style2">
            <?php
    $category = $_GET['category'];

    if($category != ''){
        $category = $_GET['category'];
        $sql = "SELECT b.blogID, b.blogTitle, b.blogContents, m.youName, b.blogRegTime, b.blogView, b.blogImgFile FROM hyunBlog b JOIN hyunMember m ON(b.memberID =m.memberID) WHERE b.blogCategory='{$category}' ORDER BY blogID DESC LIMIT 8";
    } else {
        $sql = "SELECT b.blogID, b.blogTitle, b.blogContents, m.youName, b.blogRegTime, b.blogView, b.blogImgFile FROM hyunBlog b JOIN hyunMember m ON(b.memberID =m.memberID) ORDER BY blogID DESC LIMIT 8";
    }

    $result = $connect -> query($sql);
   
    foreach ($result as $blog) {
?>
        <div>
            <figure>
                <img src="../assets/img/blog/<?=$blog['blogImgFile']?>" alt="vscode에 scss설치하기">
                <a href="http://phs8197.dothome.co.kr/php2/blog/blogView.php?blogID=<?=$blog['blogID']?>" class="go" title="컨텐츠 바로가기">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.646447 8.64645C0.451184 8.84171 0.451184 9.15829 0.646447 9.35355C0.841709 9.54882 1.15829 9.54882 1.35355 9.35355L0.646447 8.64645ZM9.5 1C9.5 0.723858 9.27614 0.5 9 0.5L4.5 0.5C4.22386 0.5 4 0.723858 4 1C4 1.27614 4.22386 1.5 4.5 1.5L8.5 1.5L8.5 5.5C8.5 5.77614 8.72386 6 9 6C9.27614 6 9.5 5.77614 9.5 5.5L9.5 1ZM1.35355 9.35355L9.35355 1.35355L8.64645 0.646447L0.646447 8.64645L1.35355 9.35355Z" fill="white"/>
                    </svg>
                </a>
            </figure>
            <div>
                <h3><a class="title" href="http://phs8197.dothome.co.kr/php2/blog/blogView.php?blogID=<?=$blog['blogID']?>"><?=$blog['blogTitle']?></a></h3>
                <p><a class="contents" href="http://phs8197.dothome.co.kr/php2/blog/blogView.php?blogID=<?=$blog['blogID']?>"><?=$blog['blogContents']?></a></p>
            </div>
        </div>   
<?php
}?>
                    </div>
            </div>
            <div class="card__more">
                <a href="#">더보기</a>
            </div>
        </article>

    </main>
    <!— //main —>

    <?php include "../include/footer.php" ?>
    <!— //footer —>

</body>

</html>
