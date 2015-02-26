<?php

namespace matacms\controllers\base;

use yii\filters\AccessControl;

abstract class AuthenticatedController extends \yii\web\Controller {
	public function behaviors() {
		return [
		'access' => [
		'class' => AccessControl::className(),
		'rules' => [
		[
		'allow' => true,
		'roles' => ['@'],
		],
		],
		]
		];
	}
}