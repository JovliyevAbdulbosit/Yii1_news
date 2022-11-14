<?php

$this->pageTitle = Yii::t("translation", "auths");
$this->breadcrumbs=array(
	Yii::t("translation", "auths"),
	Yii::t('translation', 'list'),
);

$this->menu=array(	
	array('label'=>Yii::t("translation", "create"), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'auth-grid',
        'pager'=>'ext.TbLinkPager',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'full_name',
		array(
			'class'=>'ext.TbButtonColumn',
		),
	),
)); ?>
