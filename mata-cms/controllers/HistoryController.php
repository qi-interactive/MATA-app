<?php 

namespace matacms\controllers;

use mata\arhistory\models\Revision;

class HistoryController extends \yii\web\Controller {

	public function actionIndex($documentId) {

		$revisions = Revision::find()->where([
			"DocumentId" => $documentId
			])->orderBy("Revision DESC")->all();

		echo $this->render("history", [
			"revisions" => $revisions
			]);
	}

}