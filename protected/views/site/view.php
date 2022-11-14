<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="d-flex">
<div class="card mb-3" style="width: 60%;">
    <img src="/<?= $model['image']?>" class="card-img-top" alt="..." style="height:1000px">
    <div class="card-body">
        <h5 class="card-title"><?= $model['title'] ?>
        </h5>
        <p class="card-text"><?= $model['news_text'] ?></p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
</div>
    <div class='d-inline'>
            <?php foreach ($left_bar as $item): ?>
                <div class="card d-flex flex-row" style="width: 25rem;">
                    <div class="col-4 p-0">
                        <img src="/<?= $item['image'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-8 p-3">
                        <p class="m-0"><?php echo CHtml::link($item['title'],'/uz/site/view/'.$item['id'] )?></b></a></p>
                        <p  style="font-size: 14px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. <br></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
 </div>