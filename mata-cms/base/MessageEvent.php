<?php 

namespace matacms\base;

class MessageEvent extends \yii\base\Event {

	const LEVEL_SUCCESS = "success";
	const LEVEL_INFO = "info";
	const LEVEL_WARNING = "danger";
	const LEVEL_ERROR = "danger";

    private $message;
    private $level;

    public function __construct($message, $level = self::LEVEL_SUCCESS) {
    	$this->message = $message;
    	$this->level = $level;
    	parent::__construct([]);
    }

    public function getMessage() {
    	return $this->message;
    }

    public function getLevel() {
    	return $this->level;
    }
}