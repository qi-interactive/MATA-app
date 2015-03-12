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
		$certPath = \Yii::getAlias("@app") . "/modules/deployer/";


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

		
		$this->disable_ob();
		// system("sh " . $certPath . "test.sh  2>&1");
		system("cd /home/ec2-user/capistrano/recipes/cap3/themellier.qi-interactive.com && cap staging deploy");

		// $api = new Github\Api;
		// $response = $api->get('/repos/qi-interactive/mata-media');
		// $repo = $api->decode($response);

		// echo $repo->name;

		// echo $id;
}

function disable_ob() {
    // Turn off output buffering
    ini_set('output_buffering', 'off');
    // Turn off PHP output compression
    ini_set('zlib.output_compression', false);
    // Implicitly flush the buffer(s)
    ini_set('implicit_flush', true);
    ob_implicit_flush(true);
    // Clear, and turn off output buffering
    while (ob_get_level() > 0) {
        // Get the curent level
        $level = ob_get_level();
        // End the buffering
        ob_end_clean();
        // If the current level has not changed, abort
        if (ob_get_level() == $level) break;
    }
    // Disable apache output buffering/compression
    if (function_exists('apache_setenv')) {
        apache_setenv('no-gzip', '1');
        apache_setenv('dont-vary', '1');
    }
}

}