<div class="view">
    <div class="row">
        <div class="col-11">
            <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>

            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
            <?php echo CHtml::encode($data->title); ?>
            <br />
        </div>
        <div class="col">
            <a class="btn bg-primary" href="update/<?= $data->id ?>">update</a>
        </div>
    </div>
</div>