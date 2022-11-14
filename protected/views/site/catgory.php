<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
    <?php foreach ($models as $model): ?>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="/<?= $model->image; ?>" class="card-img-top" alt="..." height="250px">
                <div class="card-body">
                    <h5 class="card-title"> <?= $model->title; ?></h5>
                    <p class="card-text"><?= $model->news_text; ?></p>
                    <?php echo CHtml::link(Yii::t('translation','Go somewhere'),'/uz/site/view/'.$model['id'] ,['class'=>'btn btn-primary'] )?>
                  
                </div>
            </div>   
        </div> 
    <?php endforeach; ?>
</div>
<center class="mt-4">
    
    <?php
    $this->widget('CLinkPager', array(
        'pages' => $pages,
        'prevPageLabel' => '<<<',
        'nextPageLabel' => '>>>',
//        'header' => '',
//         'htmlOptions'        =>  array(
//         'class' => 'pagination'
//         ),
        'previousPageCssClass' => 'page-link',
        'selectedPageCssClass' => 'page-link',
        'internalPageCssClass' => 'page-link',
        'nextPageCssClass' => 'page-link',
        
    ))
    ?>
    
</center>
<style>
   ul.yiiPager a:link{
        border:none;
    }
</style>