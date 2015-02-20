<?php
namespace matacms\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionWelcome() {
    	$this->layout = "@matacms/views/layouts/module";
        return $this->render("welcome");
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
