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
            <h2>블로그 글 수정하기</h2>
            <p>웹디자이너, 웹퍼블리셔, 프론트앤드 개발자를 위한 블로그입니다.</p>
            <div class="write__inner">
                <div class="blog__modify">
                    <form action="blogModifySave.php" name="blogModify" method="post">
                        <fieldset>
                            <legend>블로그 수정 영역입니다.</legend>

<?php
    $boardID = $_GET['blogID'];

    $sql = "SELECT blogID, blogTitle, blogContents FROM hyunBlog WHERE blogID = {$blogID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<div style='display:none'><label for='blogID'>번호</label><input type='text' name='blogID' id='blogID' value='".$info['blogID']."'></div>";
        echo "<div><label for='blogTitle'>제목</label><input type='text' name='blogTitle' id='blogTitle' value='".$info['blogTitle']."'></div>";
        echo "<div><label for='blogContents'>내용</label><textarea name='blogContents' id='blogContents' rows='20'>".$info['blogContents']."</textarea></div>";
        echo "<div><label for='blogPass'>비밀번호</label><input type='password' name='blogPass' id='blogPass' placeholder='로그인 비밀번호를 입력해주세요!' autocomplete='off' required></input></div>";
    }
?>
                            <!-- <div>
                                <label for="boardID">번호</label>
                                <input type="text" name="boardID" id="boardID">
                            </div>
                            <div>
                                <label for="boardTitle">제목</label>
                                <input type="text" name="boardTitle" id="boardTitle">
                            </div>
                            <div>
                                <label for="boardContents">내용</label>
                                <textarea name="boardContents" id="boardContents" rows="20"></textarea>
                            </div>
                            <div>
                                <label for="boardPass">비밀번호</label>
                                <input type="password" name="boardPass" id="boardPass" placeholder="로그인 비밀번호를 입력해주세요!"
                                    autocomplete="off" required></input>
                            </div> -->
                            <button type="submit" value="수정하기" class="btn">수정하기</button>
                            <a href="blog.php" class="btn mr10">목록보기</a> 
                    </form>
                </div>
            </div>
        </section>
        <!-- //board -->
    </main>
    <!-- //main -->
</body>

</html>
