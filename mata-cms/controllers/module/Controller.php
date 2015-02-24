<?php

namespace matacms\controllers\module;

use Yii;
use yii\web\Controller as BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use matacms\filters\NotificationFilter;
use matacms\base\MessageEvent;
use yii\filters\AccessControl;

abstract class Controller extends BaseController {

	const EVENT_MODEL_CREATED = "EVENT_MODEL_CREATED";
	const EVENT_MODEL_UPDATED = "EVENT_MODEL_UPDATED";
	const EVENT_MODEL_DELETED = "EVENT_MODEL_DELETED";

	public function behaviors() {
		return [
		'verbs' => [
			'class' => VerbFilter::className(),
			'actions' => [
				'delete' => ['post'],
			],
		],
		'access' => [
		    'class' => AccessControl::className(),
		    // 'only' => ['logout', 'signup'],
		    'rules' => [
		    	[
	               'allow' => true,
	               'roles' => ['@'],
	           ],
		    ],
		],
		'notifications' => [
			'class' => NotificationFilter::className(),
			]
		];
	}

	public function actionCreate() {
		$model = $this->getModel();
		$model = new $model;

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$this->trigger(self::EVENT_MODEL_CREATED, new MessageEvent($model->getLabel()));
			return $this->redirect(['index', 'id' => $model->Id]);
		} else {
			return $this->render('create', [
				'model' => $model,
				]);
		}
	}

	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$this->trigger(self::EVENT_MODEL_UPDATED, new MessageEvent($model->getLabel()));
			return $this->redirect(['index', 'id' => $model->Id]);
		} else {
			return $this->render('update', [
				'model' => $model,
				]);
		}
	}

	public function actionDelete($id) {

		$model = $this->findModel($id);
		$label = $model->getLabel();
		$model->delete();

		$this->trigger(self::EVENT_MODEL_DELETED, new MessageEvent($label));
		return $this->redirect(['index']);
	}

	/**
	 * Lists all ContentBlock models.
	 * @return mixed
	 */
	public function actionIndex() {

		$searchModel = $this->getSearchModel();
		$searchModel = new $searchModel();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			]);
	}


	protected function findModel($id) {

		$model = $this->getModel();

		if (($model = $model::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	protected abstract function getModel();
	protected abstract function getSearchModel();

}

