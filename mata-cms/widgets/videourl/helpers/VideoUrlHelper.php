<?php

namespace matacms\widgets\videourl\helpers;

use yii\helpers\Json;

class VideoUrlHelper 
{

	public static function getVideoServiceProvider($videoUrl) 
    {
        $url = preg_replace('#\#.*$#', '', trim($videoUrl));
        $services_regexp = [
        '/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/'     => 'vimeo',
        '/(?:https?:\/\/)?(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=)?([\w-]{10,})/'     => 'youtube'
        ];

        foreach ($services_regexp as $pattern => $service) {
            if(preg_match($pattern, $videoUrl, $matches)) {
                return $service;
            }
        }

        return false;
    }

    public static function getVideoId($videoUrl) 
    {
        $url = preg_replace('#\#.*$#', '', trim($videoUrl));
        $services_regexp = [
        '/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*(?P<id>[0-9]{6,11})[?]?.*/'     => 'vimeo',
        '/(?:https?:\/\/)?(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=)?(?P<id>[\w-]{10,})/'     => 'youtube'
        ];

        foreach ($services_regexp as $pattern => $service) {
            if(preg_match($pattern, $videoUrl, $matches)) {
                return $matches['id'];
            }
        }

        return false;
    }

    public static function renderVideoPlayer($videoUrl) 
    {
        $videoProvider = self::getVideoServiceProvider($videoUrl);
        $videoId = self::getVideoId($videoUrl);

        $videoPlayerCode = '';

        switch($videoProvider) {
        	case 'vimeo':
        		$videoPlayerCode = '<iframe id="video-player" src="//player.vimeo.com/video/' . $videoId . '?autoplay=0&api=1&player_id=video-player" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        		break;
        	default:
        		$videoPlayerCode = '<iframe width="500" height="281" src="http://www.youtube.com/embed/' . $videoId . '"></iframe>';
        		break;
        }
        return $videoPlayerCode;
    }

    public static function getPicture($videoUrl) 
    {
        $videoProvider = self::getVideoServiceProvider($videoUrl);
        $videoId = self::getVideoId($videoUrl);

        $videoImage = false;

        switch($videoProvider) {
            case 'vimeo':
                $videoImage = self::vimeoApi($videoId);
                break;
            case 'youtube':
                $videoImage = self::youtubeApi($videoId);
                // $videoImage = '<img src="' . $videoId . '">';
                break;
            default:
                break;
        }
        return $videoImage;
    }

    public static function vimeoApi($videoId) 
    {
        $contents = @file_get_contents('https://vimeo.com/api/v2/video/' . $videoId . '.json');
        if(!$contents)
            return false;
        $contents = Json::decode($contents, false);
        return $contents[0]->thumbnail_medium;
    }

    public static function youtubeApi($videoId) 
    {
        return 'https://img.youtube.com/vi/' . $videoId . '/0.jpg';
    }
    
}