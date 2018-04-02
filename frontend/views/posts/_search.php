<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use matacms\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    #post-search {
        padding: 20px;
        margin-bottom: 20px;
    }

    label {
        margin-bottom: 5px;
    }

</style>

<div class="uk-background-muted">

    <div id="post-search">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'Category_One')->dropDownList(["Zapowiedź" => "Zapowiedź", "Relacja" => "Relacja"],["clientOptions" => ["allowEmptyOption" => true]]) ?>
        <?= $form->field($model, 'Category_Two')->dropDownList(["Parafia" => "Parafia", "Dekanat" => "Dekanat", "Diecezja" => "Diecezja", "Polska" => "Polska"],["clientOptions" => ["allowEmptyOption" => true]]) ?>
        <?= $form->field($model, 'Priority')->dropDownList(["Duża" => "Duża", "Średnia" => "Średnia", "Mała" => "Mała"], ["clientOptions" => ["allowEmptyOption" => true]]) ?>

        <div style="position: relative">
        <?= $form->field($model, 'PublicationDate')->datetime() ?>
        </div>

        <?= $form->field($model, 'Title') ?>
        <?= $form->field($model, 'Body') ?>


        <div class="form-group">
            <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary']) ?>
            <?= Html::submitButton('Reset', ['class' => 'btn btn-default', 'onclick' => 'clearForm()']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>

    clearForm = function() {
        $("#post-search input").val("");
        $("#post-search select").each(function() {
            var $select = $(this).selectize();
            var control = $select[0].selectize;
            control.clear();
        })
    }
</script>