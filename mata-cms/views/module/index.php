<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel mata\contentblock\models\ContentBlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-block-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(sprintf('Create %s', \Yii::$app->controller->id), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'Id',
        'Title:ntext',
        'Text:ntext',
        'Region',

        ['class' => 'yii\grid\ActionColumn'],
        ],
        ]); ?>

    </div>
