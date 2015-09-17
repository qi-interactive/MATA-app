<?php

namespace frontend\helpers;

/**
 * Description of SocialShare
 *
 * @author marcinwiatr
 */
class SocialShare {

    public static function facebook($linkText = 'Facebook', $text = '', $url = null, $htmlOptions = []) {
        if ($url == null)
            $url = (empty($_SERVER['HTTPS']) == false ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        return '<a target="_blank" href="http://www.facebook.com/sharer.php?u=' . urlencode($url) . '" class="'. $htmlOptions['class'] . '">' . $linkText . '</a>';
    }

    public static function twitter($linkText = 'Twitter', $text = '', $url = null,  $htmlOptions = []) {
        if ($url == null)
            $url = (empty($_SERVER['HTTPS']) == false ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        return '<a target="_blank" href="https://twitter.com/intent/tweet?url=' . urlencode($url) . '%2F&text=' . urlencode($text) . '" class="'. $htmlOptions['class'] . '">'. $linkText . '</a>';
    }


    public static function linkedIn($linkText = 'LinkedIn', $title = '', $text = '', $url = null,  $htmlOptions = []) {
        if ($url == null)
            $url = (empty($_SERVER['HTTPS']) == false ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

        return '<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=' . $url . '%2F&title=' . urlencode($title) . '&summary=' . urlencode($text) . '" class="'. $htmlOptions['class'] . '">' . $linkText . '</a>';
    }

    public static function googlePlus($linkText = 'Goggle+', $title = '', $text = '', $url = null,  $htmlOptions = []) {
        if ($url == null)
            $url = (empty($_SERVER['HTTPS']) == false ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

        return '<a target="_blank" href="https://plus.google.com/share?url=' . urlencode($url) . '" class="'. $htmlOptions['class'] . '">' . $linkText . '</a>';
    }

    public static function registerMetaTags($title, $description, $image = null, $appName = null) {

        $view = \Yii::$app->controller->view;

        $view->registerMetaTag(
            [
            "property" => "og:title",
            "content" => $title,
            ]);

        $view->registerMetaTag(
            [
            "property" => "og:description",
            "content" => $description,
            ]);

        if ($image)
            $view->registerMetaTag(
                [
                "property" => "og:image",
                "content" => $image,
                ]);

        if ($appName)
            $view->registerMetaTag(
                [
                "property" => "og:site_name",
                "content" => $appName,
                ]);
    }
}

?>
