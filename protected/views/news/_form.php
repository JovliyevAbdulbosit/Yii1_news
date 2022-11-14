
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'news-form',
    'enableAjaxValidation' => false,
    
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));

?>

<?php echo $form->errorSummary($model); ?>
<div class="container bg-warning" style="width:50%">
<div class="mb-3">
    <?php echo $form->labelEx($model, 'title'); ?>
    <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'size' => 55, 'maxlength' => 55)); ?>
    <?php echo $form->error($model, 'title'); ?>
</div>

<div class="mb-3">
    <?php echo $form->labelEx($model, 'ctgory_id').'<br>'; ?>
    <?php echo $form->dropDownList($model,'ctgory_id', CHtml::listData(Ctgory::model()->findAll(), 'id', 'title'),
            array('class'=>'form-select'));
?>
    <?php echo $form->error($model, 'ctgory_id'); ?>
</div>

<div class="mb-3">
    <?php echo $form->labelEx($model, 'auth_id').'<br>'; ?>
    <?php echo $form->dropDownList($model,'auth_id', CHtml::listData(Auth::model()->findAll(), 'id', 'full_name'),
            array('class'=>'form-select'));
?>
    <?php echo $form->error($model, 'auth_id'); ?>
</div>

<div class="mb-3">
    <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
'model'=>$model,
'attribute'=>'news_text',
'language'=>'ru',
'editorTemplate'=>'full',
)); ?>
</div>
<div class="mb-3">
    <?php echo $form->labelEx($model, 'imageFile'); ?>
    <?php echo CHtml::activeFileField($model, 'imageFile',array('class'=>'form-select')); ?>
     <?php echo $form->error($model, 'imageFile'); ?>
</div>




<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>


<?php $this->endWidget(); ?>
</div>

