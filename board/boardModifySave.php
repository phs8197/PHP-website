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

    $boardID = $_POST['boardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardPass = $_POST['boardPass'];

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $boardPass = $connect -> real_escape_string($boardPass);
    $memberID = $_SESSION['memberID'];

    $sql = "SELECT * FROM hyunMember WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        if($info['memberID'] == $memberID && $info['youPass'] == $boardPass){
            $sql = "UPDATE hyunBoard SET boardTitle = '{$boardTitle}', boardContents ='{$boardContents}' WHERE boardID = '{$boardID}'";
            $connect -> query($sql);
        } else{
            echo "<script>alert('비밀번호가 틀렸습니다. 다시 한번 확인해주세요')</script>";
        }
    } else{
        echo "<script>alert('관리자 에러!!')</script>";
    }
?>
</body>
</html>
