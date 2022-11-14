<?php

$this->pageTitle = Yii::t("translation", "news");
$this->breadcrumbs=array(
	Yii::t("translation", "news"),
	Yii::t('translation', 'list'),
);

$this->menu=array(	
	array('label'=>Yii::t("translation", "create"), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
        'pager'=>'ext.TbLinkPager',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'ctgory_id',
		'auth_id',
		'news_text',
		'imge',
		array(
			'class'=>'ext.TbButtonColumn',
		),
	),
)); ?>
