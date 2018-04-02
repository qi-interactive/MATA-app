<?php

use yii\helpers\Html;
use matacms\widgets\ActiveForm;



?>
<div class="post">

    <?php $form = ActiveForm::begin([
        "id" => "form-post"
    ]);
    ?>


    <?= $form->field($model, 'Title') ?>
    <?= $form->field($model, 'Lead') ?>

    <?= $form->field($model, 'Body')->wysiwyg([
    ]) ?>

    <?=  $form->field($model, 'Priority')->dropDownList(["Duża" => "Duża", "Średnia" => "Średnia", "Mała" => "Mała"], ['prompt' => 'Ważność informacji', 'clientOptions' => ['create' => false]]); ?>

    <?=  $form->field($model, 'Category_One')->dropDownList(["Zapowiedź" => "Zapowiedź", "Relacja" => "Relacja"], ['prompt' => 'Kategoria 1', 'clientOptions' => ['create' => false]]); ?>

    <?=  $form->field($model, 'Category_Two')->dropDownList(["Parafia" => "Parafia", "Diecezja" => "Diecezja", "Polska" => "Polska", "Kalendarium Biskupa" => "Kalendarium Biskupa"], ['prompt' => 'Kategoria 2', 'clientOptions' => ['create' => false]]); ?>

    <?= $form->field($model, 'Carousel')->carousel() ?>

    <div class="form-row">

        <div class="form-group">
            <label class="control-label" for="post-publicationdatestart">Wydarzenie wielodniowe</label>
                <input type="checkbox" id="is_multiday" />
            <div class="help-block"></div>
        </div>

    </div>

    <?= $form->field($model, 'PublicationDate')->datetime([
        "minDate" => "2017-01-01 12:00:00"
    ]) ?>


    <?= $form->field($model, 'PublicationDateEnd')->datetime([
        "minDate" => "2017-01-01 12:00:00"
    ]) ?>


    <?= $form->field($model, 'URI')->slug('Title') ?>

    <?= $form->submitButton($model) ?>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS

  $(window).load(function() {
      
      if ($("#post-publicationdateend").val()) {
           $("#is_multiday").prop("checked", true);
      }
      
      updateTimeFields()
      
      $("#is_multiday").on("change", updateTimeFields);
      
      $("form").submit(function() {
            if ($("#is_multiday").is(":checked") == false) {
                $("#post-publicationdateend").val("")
            }
      })
  })

  updateTimeFields = function() {
    var isChecked = $("#is_multiday").is(":checked");

      if (isChecked) {
          $("#post-publicationdateend").parents(".form-group").first().show();
      } else {
          $("#post-publicationdateend").parents(".form-group").first().hide();
      }

  }
JS;
$this->registerJs($script);

