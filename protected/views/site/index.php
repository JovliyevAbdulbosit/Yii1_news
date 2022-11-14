<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
var x = 0;
$(document).ready(function(){
  $(window).scroll(function(){
    $("span").text( x+= 1);
    $(".none").show()
  });
});
</script>
<div class="row">
    <div class='col-4'>
        <div class='d-inline'>
            <?php foreach ($left_bar as $item): ?>
                <div class="card d-flex flex-row" style="width: 25rem;">
                    <div class="col-4 p-0">
                        <img src="/<?= $item['image'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-8 p-3">
                        <p class="m-0"><a href="<?php echo CHtml::normalizeUrl(array('/site/view/'))?><?= '/'.$item['id'] ?>"><b><?= Yii::t("translation", "list"); ?></b></a></p>
                        <p  style="font-size: 14px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. <br></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- comm-->
    <div class="col-8">
        <div class="card">
            <img src="https://images.pexels.com/photos/1761282/pexels-photo-1761282.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1..." 
                 class="card-img-top" alt="..." style="height: 600px">
            <div class="card-body">
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
                    but also the leap into electronic typesetting, remaining essentially unchanged.
                    It was popularised in the 1960s with the release of Letraset sheets containing 
                    Lorem Ipsum passages, and more recently with desktop publishing software like 
                </p>


            </div>
        </div>
        <div class="row">
            <?php foreach ($models as $item): ?>
                <div class='col-6 mt-2'>
                    <div class="card d-flex flex-row" style="width: 25rem;">
                        <div class="col-4 p-0">
                            <img src="/<?= $item['image'] ?>" class="card-img-top" alt="..." width="120" height="160">
                        </div>
                        <div class="col-8 ">
                            <p class="m-0"><?php echo CHtml::link(Yii::t('translation','sarlavha'),'/uz/site/view/'.$item['id'] )?></p>
                            <p class="card-text m-2" style="font-size:14px">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard 
                                 
                               
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div style="clear: both"></div> 
    </div>

</div>

<center class="mt-4">
    
    <?php
    $this->widget('CLinkPager', array(
        'pages' => $pages,
        'prevPageLabel' => '<<<',
        'nextPageLabel' => '>>>',
//        'header' => '',
//         'htmlOptions'        =>  array(
//         'class' => 'pagination'
//         ),
        'previousPageCssClass' => 'page-link',
        'selectedPageCssClass' => 'page-link',
        'internalPageCssClass' => 'page-link',
        'nextPageCssClass' => 'page-link',
        
    ))
    ?>
    
</center>
<style>
   ul.yiiPager a:link{
        border:none;
    }
    .none{
        display: none;
    }
</style>

<?= Yii::t("translation", "banners")?>
<!--footer-->
<span>111</span>
