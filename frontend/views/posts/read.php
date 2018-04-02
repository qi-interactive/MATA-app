<style>
    img {
        height: 400px;
    }
</style>
<div>
    <a class="uk-button uk-button-primary" href="/">&#8617; Powrót</a>
</div>

<br/><br/>

<?php if ($model->Category_One): ?>
    <span class="uk-label uk-label-warning"><?= $model->Category_One ?></span>
<?php endif; ?>

<?php if ($model->Category_Two): ?>
    <span class="uk-label uk-label-warning"><?= $model->Category_Two ?></span>
<?php endif; ?>

<br/><br/>

<h2><?= $model->Title ?></h2>

<?php if ($model->Category_Two): ?>
    <small><?= $model->Author ?></small>
<?php endif; ?>

<br /><br/>

<div id="carousel-items">
<?php

$carouselItems = $model->getCarouselItems();


if ($carouselItems != null):
    foreach($carouselItems as $item):
        ?>
        <img src="<?= $item->getMedia()->URI ?>" />
    <?php endforeach; endif; ?>

</div>

<div class="uk-background-muted">
    <h3><?= $model->Lead ?></h3>
</div>
<?= $model->Body ?>