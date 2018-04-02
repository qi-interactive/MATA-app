<?php
namespace frontend\controllers;

use Yii;
use frontend\controllers\base\AppController;
use matacms\post\models\PostSearch;
use matacms\post\models\Post;
/**
 * Site controller
 */
class PostsController extends AppController {

    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

    }

    public function actionRead($uri) {
        $model = Post::find()->where(["URI" => $uri])->one();

        return $this->render("read", [
            "model" => $model
        ]);
    }
}
