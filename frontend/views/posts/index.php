
<?php
use  yii\grid\GridView;

$this->title = Yii::$app->name.' - Home';

?>

<?= $this->render('_search', ['model' => $searchModel]) ?>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
'layout' =>  "{items}\n{pager}",
    'columns' => [
       [
            'label' => "Tytuł",
            'format' => "html",
            'value' => function($model) {
                return "<a href='/posts/read/" . $model->URI . "'>$model->Title</a>";
            }
        ],
        'Author',
        'PublicationDate:date',
        [
            "label" => 'Wydarzenie do:',
            "value" => function($model) {
                return $model->PublicationDateEnd ? date("d M Y", strtotime( $model->PublicationDateEnd)) : "";
            }          
],
        'Priority',
        'Category_One',
        'Category_Two',

    ],
]) ?>