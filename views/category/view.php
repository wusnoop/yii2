<?php echo \app\widgets\MenuWidget::widget() ?>
<?php

use yii\helpers\Url;

?>
<div class="container">
    <div class="row justify-content-center">

        <?php   foreach ($goods as $good){ $this->title = $good['title_name'];?>

            <div class="col-4">
                <div class="product">
                    <div class="product-img">
                        <img src="/img/<?=$good['img']?>" alt=<?=$good['name']?>>
                    </div>
                    <div class="product-name"><?=$good['name']?></div>
                    <div class="product-descr">Состав: <?=$good['composition']?></div>
                    <div class="product-price">Цена: <?=$good['price']?></div>
                    <div class="product-buttons">
                        <a type="button" data-name="<?=$good['link_name']?>" class="product-button__add btn btn-success">Заказать</a>
                        <a href="<?=Url::to(['good/index', 'name'=>$good['link_name']])?>" type="button" class="product-button__more btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
