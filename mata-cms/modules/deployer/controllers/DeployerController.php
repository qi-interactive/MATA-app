<?php 

namespace matacms\modules\deployer\controllers;

use Milo\Github;

class DeployerController extends \mata\web\Controller {

	public function actionIndex() {

		// $api = new Github\Api;
		// $response = $api->get('/orgs/qi-interactive/repos');
		// $repos = $api->decode($response);

		$selectItems = [];

		// foreach ($repos as $repo) 
		// 	$selectItems[$repo->id] = $repo->name;

		echo $this->render("projects", [
			"repos" => $selectItems
			]);
	}

	public function actionDeploy($id) {


		// header( 'Content-type: text/html; charset=utf-8' );
		// echo 'Begin ...<br />';
		// $certPath = \Yii::getAlias("@app") . "/modules/deployer/";


		// flush();
		// ob_flush();
		// $lastLine = system("sh " . $certPath . "test.sh  2>&1");
		// echo $lastLine;
		// flush();
		// ob_flush();


		// for( $i = 0 ; $i < 10 ; $i++ )
		// {
		//     echo $i . '<br />';
		//     flush();
		//     ob_flush();
		//     sleep(1);
		// }
		// echo 'End ...<br />';

		

		// system("sh " . $certPath . "test.sh  2>&1");


		// $last_line = passthru('ls', $retval);



		// Printing additional info
	// 	echo '
	// </pre>
	// <hr />Last line of the output: ' . $last_line . '
	// <hr />Return value: ' . $retval;


		// $api = new Github\Api;
		// $response = $api->get('/repos/qi-interactive/mata-media');
		// $repo = $api->decode($response);

		// echo $repo->name;

		// echo $id;
}

}