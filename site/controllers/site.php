<?php
    return function ($page, $site) {
        $is_info = $page -> template() == 'info-page';
        $is_event = $page -> template() == 'event-page';
        $is_media = $page -> template() == 'media-file';
        $is_pdf = $page -> template() == 'extra-file';

        return [
            'is_info' => $is_info,
            'is_event' => $is_event,
            'is_media' => $is_media,
            'is_pdf' => $is_pdf
        ];
    };