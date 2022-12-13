<?php
    $newCommentsql = "SELECT * FROM hyunComment ORDER BY commentRegTime DESC LIMIT 4";
    $newCommentResult =  $connect -> query($newCommentsql);
    foreach ($newCommentResult as $newComment) {
?>
<ul>
    <li><a href="blogView.php?blogID=<?=$newComment['blogID']?>"><?=$newComment['commentContents']?>&ensp;<?=date('Y-m-d', $newComment['commentRegTime'])?></a></li>
</ul>
<?php
}?>
