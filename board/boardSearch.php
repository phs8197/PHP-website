<?php include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
   
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];

    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));

    $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM hyunBoard b JOIN hyunMember m ON(b.memberID = m.memberID)";

    switch($searchOption){
        case "title";
        $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
        case "content";
        $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
        case "name";
        $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
    }

    $result = $connect -> query($sql);
    $totalCount = $result -> num_rows;
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
        <section id="board" class="container section">
            <h2>검색 결과입니다.</h2>
            <p>총 몇<?=$totalCount?>건이 검색되었습니다.</p>
            <div class="board__inner">
                <div class="board__table">
                    <table>
                        <colgroup>
                            <col style="width: 5%">
                            <col>
                            <col style="width: 10%">
                            <col style="width: 10%">
                            <col style="width: 7%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>등록자</th>
                                <th>등록일</th>
                                <th>조회수</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
    $viewNum = 10;
    $viewLimit = ($viewNum * $page) -$viewNum;

    $sql .= "LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;
        if($count >0){
            for($i=0; $i<$count; $i++){
                $info = $result ->fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$info['boardID']."</td>";
                echo "<td><a href='boardView.php?boardID={$info['boardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youName']."</td>";
                echo "<td>".date('Y-m-d',$info['regTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
        }
    }

?>
                        </tbody>
                    </table>
                </div>
                <div class="board__pages">
                    <ul>

<?php
    // 총 페이지 갯수를 계산해야됨
    $boardTotalCount = ceil($totalCount/$viewNum);

    // 1 2 3 4 5 6 7 8 9 10
    $pageView = 5;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    //처음 페이지 초기화
    if($startPage < 1) $startPage =1;

    // 마지막 페이지
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;
    // 이전
    if($page !=1){
        $prevPage = $page -1;
        echo "<li><a href='boardSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
    }
    // 처음으로
    if($page != 1){
        echo "<li><a href='boardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
    }

    // 페이지
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) {
            $active = "active";
        }

        echo "<li class='{$active}'><a href='boardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
    }
    
    // 다음
  if($page != $endPage){
    $nextPage = $page +1;
    echo "<li><a href='boardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
}
    // 마지막으로
    if($page != $endPage){
        echo "<li><a href='boardSearch.php?page={$endPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
    }

?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- //board -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->

</body>

</html>
