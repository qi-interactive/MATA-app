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
}