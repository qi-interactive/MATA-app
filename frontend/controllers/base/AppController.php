<?php

namespace frontend\controllers\base;
use yii\web\Controller;

class AppController extends Controller {

	public $pageTitle = '';

	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ]
        ];
    }

}


?>
