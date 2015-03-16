<?php

namespace matacms\widgets\videourl\helpers;

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
        		break;
        }
        return $videoPlayerCode;
    }
}