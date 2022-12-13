<?php
    $blogViewsql = "SELECT * FROM hyunBlog ORDER BY blogView DESC LIMIT 4";
    $blogView =  $connect -> query($blogViewsql);
    foreach ($blogView as $view) {
?>
<ul>
    <li><a href="blogView.php?blogID=<?=$view['blogID']?>"><?=$view['blogTitle']?>&ensp;<?=date('Y-m-d', $view['blogRegTime'])?></a></li>
</ul>
<?php
}?>
