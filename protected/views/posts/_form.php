<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'posts-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

    <?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'image'); ?>
<?php echo $form->fileField($model, 'image', array('class' => 'form-control', 'size' => 55, 'maxlength' => 55)); ?>
<?php echo $form->error($model, 'image'); ?>
</div>


<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>


<?php $this->endWidget(); ?>
