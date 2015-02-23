<?php 

namespace matacms\widgets;

class ActiveField extends \yii\widgets\ActiveField {

	public function wysiwyg($options = []) {
		$options = array_merge($this->inputOptions, $options);
		$this->adjustLabelFor($options);
		$this->parts['{input}'] = \yii\imperavi\Widget::widget([
			'model' => $this->model,
			'attribute' => $this->attribute,
			'options' => $options
			]);

		return $this;
	}
}