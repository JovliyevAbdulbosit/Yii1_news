<?php
$this->breadcrumbs = array(
    Yii::t("translation", "ctgories"),
);

$this->menu = array(
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
);
?>
<div class='row'>
    <div class="col-11">
        <h1><?php echo Yii::t("translation", "list"); ?></h1>
    </div>
    <div class="col">
        <a class="btn bg-primary" href="create/">create</a>
    </div>
</div>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $model->search(),
    'itemView' => '_view',
));
?>
 <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'news-category-grid',
                'pager' => 'ext.TbLinkPager',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'id',
                    'title',
                    array(
                        'class' => 'ext.TbButtonColumn',
                    ),
                ),
            ));
            ?>
