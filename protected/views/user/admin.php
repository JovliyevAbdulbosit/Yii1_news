<?php

$this->pageTitle = Yii::t("translation", "users");
$this->breadcrumbs=array(
	Yii::t("translation", "users"),
	Yii::t('translation', 'list'),
);

$this->menu=array(	
	array('label'=>Yii::t("translation", "create"), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
        'pager'=>'ext.TbLinkPager',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'email',
		'password',
		'role',
		'status',
		'create_time',
		/*
		'update_time',
		'authorization_time',
		'name',
		'surname',
		'phone',
		'lang',
		'recover_password',
		'image',
		*/
		array(
			'class'=>'ext.TbButtonColumn',
		),
	),
)); ?>
