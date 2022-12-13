<?php
    $blogRegTimesql = "SELECT * FROM hyunBlog ORDER BY blogRegTime DESC LIMIT 4";
    $blogRegTime =  $connect -> query($blogRegTimesql);
    foreach ($blogRegTime as $regTime) {
?>
<ul>
   <li><a href="blogView.php?blogID=<?=$regTime['blogID']?>"><?=$regTime['blogTitle']?>&ensp;<?=date('Y-m-d', $regTime['blogRegTime'])?></a></li>
</ul>
<?php
}?>
