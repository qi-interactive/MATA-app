<?php 

use yii\selectize\Selectize;
use matacms\modules\deployer\assets\ModuleAsset;

ModuleAsset::register($this);


	echo Selectize::widget([
			"items" => $repos
		]);

?>

