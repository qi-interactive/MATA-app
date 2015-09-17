<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    'css/behaviors/behaviors.css',
    'css/site.css',
    ];
    public $js = [
    'js/base/base.js',
    'js/base/behaviors.js',
    'js/base/fastclick.js',
    'js/base/modernizr.js',
    'js/base/imagesloaded.pkgd.min.js',
    'js/main.js'
    ];
    public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
    
    ];
}
