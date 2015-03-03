<?php

namespace matacms\modules\news;

use mata\helpers\MataModuleHelper;

class Module extends \matacms\post\Module {

	public $extendedModule;

	public function init() {

		 // $this->controllerMap = [$this->id => "matacms\modules\news\controllers\ProxyController"];
		 // $mimickedModule = $this->getMimickedModule();

		// $this->setBasePath($mimickedModule->getBasePath());

		 // $this->module = \Yii::$app->getModule("post");

		// $this->controllerMap = $mimickedModule->controllerMap;
		// $this->defaultRoute = $mimickedModule->defaultRoute;
		// $this->controllerNamespace = $mimickedModule->controllerNamespace;

		parent::init();
	}

	public function getNavigation() {
		return str_replace("post", "news", parent::getNavigation());
	}

	public function getExtendedModule() {
		return \Yii::$app->getModule("post");
	}


}