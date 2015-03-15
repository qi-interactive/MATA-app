<?php
use yii\helpers\Html;
use yii\web\View;
use matacms\widgets\ActiveForm;

?>

<div id="<?= $widget->id ?>" class="video-url">
	
	<?php $form = ActiveForm::begin([
		'action' => $widget->endpoint,
        'enableClientValidation' => true,
        'id' => 'video-url-form-'.$widget->id
	]); ?>

	<?= $form->field($formModel, 'videoUrl'); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
	<?php 

	$this->registerJs("
		 $('#" . $form->id . "').on('beforeSubmit', function(event, jqXHR, settings) {
            var form = $(this);
            if(form.find('.has-error').length) {
            	return false;
            }  
            
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                dataType: 'json',
                success: function(data) {
                 	" . $widget->onComplete . "
                }
            });
            
            return false;
    	});", View::POS_READY);

?>
</div>
