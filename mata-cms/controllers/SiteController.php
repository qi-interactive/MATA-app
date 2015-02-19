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

    public function actionError() {
    	echo 1;
    }
}
