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
class UikitPluginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/uikit-2.22.0';
    public $css = [

    ];
    public $js = [
        'js/uikit.js',
    ];
    public $depends = [
    ];
}
