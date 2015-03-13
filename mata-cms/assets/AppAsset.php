<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace matacms\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {
    
    public $sourcePath = '@matacms/web';

    public $css = [
        'css/site.css',
        'css/layout/navigation.css'
    ];
    public $js = [
        'js/lib/modernizr/modernizr.js',
        'js/layout/main.js',
        'js/layout/navigator.js',
        'js/layout/ajaxLoader.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}