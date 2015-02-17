<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use mata\modulemenu\models\Module as ModuleModel;
use mata\helpers\MataModuleHelper;

$modules = ModuleModel::find()->all();

$menuItems = [];

foreach ($modules as $moduleEntry) {
	$module = MataModuleHelper::getModuleByClass($moduleEntry->Location);

	if (!$module->canShowInNavigation())
		continue;

	$moduleAssetBundle = $module->getModuleAssetBundle();
	$asset = $moduleAssetBundle::register($this);

	if (!file_exists($asset->sourcePath . $module->mataConfig->icon)) {
		echo $asset->sourcePath . $module->mataConfig->icon;
	}

	$menuItems[] = sprintf("<li><a title='%s' href='%s'>%s%s</a></li>", 
		$module->getDescription(), $module->id, file_get_contents($asset->sourcePath . $module->mataConfig->icon), $module->getName());

}

if (empty($menuItems))
	return;

?>


<style>
	svg path, svg rect, svg line, svg polyline {
		stroke: white !important;
	}

	.nav > li > a {
		padding: 3.2em 1em 0;
	}


	.nav > li > a > svg {
		padding-bottom: 10px;
		display: block;
		margin: auto;
		width: 58px;
		height: 58px;
	}
</style>

<header class="cd-header">
    <div id="progress-bar"></div>
    <div id="header-content-container">
        
        <a href="#" class="cd-3d-nav-trigger">
            Menu
            <span></span>
        </a>
    </div>
</header> <!-- .cd-header -->


<nav class="cd-3d-nav-container">

	<?php
	echo Nav::widget([
		'options' => ['class' => 'cd-3d-nav'],
		'items' => $menuItems,
		]);
		?>

		<span class="cd-marker"></span>  
	</nav> <!-- .cd-3d-nav-container -->