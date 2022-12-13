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
    <title>Document</title>
</head>
<body>
    
<?php
    $memberID = $_SESSION['memberID'];
    $blogID = $_GET['blogID'];
    $commentContents = nl2br($_POST['commentContents']);
    $commentRegTime = time();

    $sql = "INSERT INTO hyunComment(blogID, memberID, commentContents, commentRegTime) VALUES('$blogID', '$memberID', '$commentContents', '$commentRegTime')";
    $connect -> query($sql);


    Header("Location: blogView.php?blogID=$blogID");
?>

</body>
</html>
