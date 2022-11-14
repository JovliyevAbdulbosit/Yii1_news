<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ctgory-form',	
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php echo $form->errorSummary($model); ?>
<div class="container bg-warning" style="width:50%">
	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>'form-control', 'size'=>55,'maxlength'=>55)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
    <br>
	
<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>
	

<?php $this->endWidget(); ?>
</div>