<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',	
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php echo $form->errorSummary($model); ?>
 <div class="container bg-warning" style="width:50%">
	<div class="form-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('class'=>'form-control', 'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->textField($model,'role',array('class'=>'form-control', 'size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'authorization_time'); ?>
		<?php echo $form->textField($model,'authorization_time',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'authorization_time'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class'=>'form-control', 'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model,'surname',array('class'=>'form-control', 'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'surname'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('class'=>'form-control', 'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->textField($model,'lang',array('class'=>'form-control', 'size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'lang'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'recover_password'); ?>
		<?php echo $form->textField($model,'recover_password',array('class'=>'form-control', 'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'recover_password'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('class'=>'form-control', 'size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	
<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>
	

<?php $this->endWidget(); ?>
 </div>