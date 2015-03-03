<?php 

namespace matacms\modules\news\controllers;

use Yii;
use matacms\modules\news\models\News;
use matacms\modules\news\models\NewsSearch;

class NewsController extends \matacms\post\controllers\PostController {

	public function getModel() {
		return new News();
	}

	public function getSearchModel() {
		return new NewsSearch();
	}

	public function findView($view = null) {

		$view =  $view ?: $this->action->id;
		$parentControllerId = $this->guessControllerId(parent::class);

		$moduleViewFile = $this->module->getViewPath() . "/" . $this->id . "/" . $view;
		$parentModuleViewFile = $this->module->getExtendedModule()->getViewPath() . "/" . $parentControllerId . "/" . $view;

		if (file_exists($moduleViewFile . ".php")) {
			$view = "@matacms/modules/" . $this->module->id . "/views/" . $this->id . "/" . $view;
		} else if (file_exists($parentModuleViewFile . ".php")) {
			$this->module->setBasePath($this->module->getExtendedModule()->getBasePath());
			$view = "@" . substr($parentModuleViewFile, stripos($parentModuleViewFile, "vendor"));
		} else {
			$view = "@matacms/views/module/" . $view;
		}

		return $view;
	}

	private function guessControllerId($controller) {

		// eg PostController;
		$controllerClass = substr($controller, strrpos($controller, "\\") + 1);

		// eg Post
		$controllerClass = str_replace("Controller", "", $controllerClass);

		// eg post
		$controllerId = lcfirst($controllerClass);

		return $controllerId;
	}
}