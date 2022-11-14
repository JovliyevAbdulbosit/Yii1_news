<?php

$this->pageTitle = Yii::t("translation", "ctgories");
$this->breadcrumbs=array(
	Yii::t("translation", "ctgories"),
	Yii::t('translation', 'list'),
);

$this->menu=array(	
	array('label'=>Yii::t("translation", "create"), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ctgory-grid',
        'pager'=>'ext.TbLinkPager',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		array(
			'class'=>'ext.TbButtonColumn',
		),
	),
)); ?>
