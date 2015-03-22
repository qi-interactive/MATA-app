<?php

use yii\helpers\Html;
use mata\arhistory\behaviors\HistoryBehavior;

$this->title = 'Update ' . get_class($model) . ': ' . ' ' . $model->getLabel();
$this->params['breadcrumbs'][] = ['label' => 'Content Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getLabel(), 'url' => ['view', 'id' => $model->getPrimaryKey()]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?php 

echo Html::a("Versions", sprintf("history?documentId=%s&returnURI=%s", $model->getDocumentId(), Yii::$app->request->url) );

?>
<div class="content-block-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render("_form", [
        'model' => $model,
    ]) ?>

</div>
