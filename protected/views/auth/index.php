<?php

$this->breadcrumbs=array(
	Yii::t("translation", "auths"),
);

$this->menu=array(
	array('label'=>Yii::t("translation", "create"), 'url'=>array('create')),	
);
?>

<div class='row'>
    <div class="col-11">
        <h1><?php echo Yii::t("translation", "list"); ?></h1>
    </div>
    <div class="col">
        <a class="btn bg-primary" href="/index.php/auth/create/">create</a>
    </div>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_view',
)); ?>
