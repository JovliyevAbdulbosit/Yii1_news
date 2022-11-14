<?php

$this->pageTitle = Yii::t("translation", "posts");
$this->breadcrumbs=array(
	Yii::t("translation", "posts"),
	Yii::t('translation', 'list'),
);

$this->menu=array(	
	array('label'=>Yii::t("translation", "create"), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'posts-grid',
        'pager'=>'ext.TbLinkPager',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'image',
		array(
			'class'=>'ext.TbButtonColumn',
		),
	),
)); ?>
