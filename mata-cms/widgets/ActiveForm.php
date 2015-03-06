<?php 

namespace matacms\widgets;

use yii\base\Event;
use matacms\base\ActiveFormMessage;

class ActiveForm extends \yii\widgets\ActiveForm {

	public $fieldClass = 'matacms\widgets\ActiveField';
	private $fieldIndex = 0;

	const EVENT_FIELD_GENERATED = "EVENT_FIELD_GENERATED";

	public function field($model, $attribute, $options = []) {
	   
	   $retVal = parent::field($model, $attribute, $options);
	   Event::trigger(self::class, self::EVENT_FIELD_GENERATED, new ActiveFormMessage($this, $model, $this->fieldIndex++));
	   return $retVal;
	}

}