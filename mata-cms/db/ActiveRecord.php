<?php

namespace matacms\db;

use mata\arhistory\behaviors\HistoryBehavior;

class ActiveRecord extends \yii\db\ActiveRecord {

	public function behaviors() {
		return [
			HistoryBehavior::className()
		];
	}

	public function getLabel() {
		
		if ($this->hasAttribute("Name") && !empty($this->Name))
			return $this->Name;

		if ($this->hasAttribute("Title") && !empty($this->Title))
			return $this->Title;

		return $this->getPrimaryKey();
	}

}