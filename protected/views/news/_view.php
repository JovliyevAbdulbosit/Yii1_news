<div class="view">
    <div class="row">
        <div class="col-11">
            <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
            <?php echo CHtml::encode($data->title); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('ctgory_id')); ?>:</b>
            <?php echo CHtml::encode($data->ctgory_id); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('auth_id')); ?>:</b>
            <?php echo CHtml::encode($data->auth_id); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('news_text')); ?>:</b>
            <?php echo CHtml::encode($data->news_text); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
            <?php echo CHtml::encode($data->image); ?>
            <br />
        </div>
        <div class="col">
            <a class="btn bg-primary" href="update/<?= $data->id ?>">update</a>
        </div>
    </div>

</div>