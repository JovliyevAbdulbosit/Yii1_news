<?php

$this->breadcrumbs=array(
	Yii::t("translation", "users"),
);

$this->menu=array(
	array('label'=>Yii::t("translation", "create"), 'url'=>array('create')),	
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_view',
)); ?>
