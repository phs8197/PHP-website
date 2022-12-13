<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $blogID = $_POST['blogID'];
    $blogTitle = $_POST['blogTitle'];
    $blogContents = $_POST['blogContents'];
    $blogPass = $_POST['blogPass'];

    $blogTitle = $connect -> real_escape_string($blogTitle);
    $blogContents = $connect -> real_escape_string($blogContents);
    $blogPass = $connect -> real_escape_string($blogPass);
    $memberID = $_SESSION['memberID'];

    $sql = "SELECT * FROM hyunMember WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        if($info['memberID'] == $memberID && $info['youPass'] == $blogPass){
            $sql = "UPDATE hyunBlog SET blogTitle = '{$blogTitle}', blogContents ='{$blogContents}' WHERE blogID = '{$blogID}'";
            $connect -> query($sql);
        } else{
            echo "<script>alert('비밀번호가 틀렸습니다. 다시 한번 확인해주세요')</script>";
        }
    } else{
        echo "<script>alert('관리자 에러!!')</script>";
    }
    Header("Location: blogView.php?blogID=$blogID");
?>
</body>

</html>
