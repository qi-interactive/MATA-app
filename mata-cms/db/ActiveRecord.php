<?php

namespace matacms\db;

class ActiveRecord extends \yii\db\ActiveRecord {

	public function getLabel() {
		
		if ($this->hasAttribute("Name") && !empty($this->Name))
			return $this->Name;

		if ($this->hasAttribute("Title") && !empty($this->Title))
			return $this->Title;

		return $this->getPrimaryKey();
	}

}