<?php
    return function ($page, $site) {
        $is_info = $page -> template() == 'info-page';
        $is_media = $page -> template() == 'media-file';

        return [
            'is_info' => $is_info,
            'is_media' => $is_media
        ];
    };