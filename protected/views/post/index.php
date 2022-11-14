<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'itemSelector' => 'div.post',
    'pages' => $pages,
));?>
<?php foreach($posts as $post): ?>
    <div class="post">
        <p>Autor: <?php echo $post->title; ?></p>
        <p><?php echo $post->news_text; ?></p>
    </div>
<?php endforeach; ?>
<div id="posts">
<?php foreach($posts as $post): ?>
    <div class="post">
        <p>Autor: <?php echo $post->title; ?></p>
        <p><?php echo $post->title ?></p>
    </div>
<?php endforeach; ?>
</div>
<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    'itemSelector' => 'div.post',
    'loadingText' => 'Loading...',
    'donetext' => 'This is the end... my only friend, the end',
    'pages' => $pages,
)); ?>