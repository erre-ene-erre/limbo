<?php

class EventPagePage extends Page
{
  public function children(): Kirby\Cms\Pages
  {
    $files = [];

    foreach ($this->images()->template('media-file') -> sort('sort', 'asc', 'filename', 'asc') as $media) {
      $files[] = [
        'slug'     => $media->name(),
        'num'      => $media->indexOf(),
        // 'num'      => $image->sort()->value(),
        'template' => 'media-file',
        'model'    => 'media-file',
      ];
    }

    foreach ($this->files()->template('extra-file') -> sort('sort', 'asc', 'filename', 'asc') as $media) {
      $files[] = [
        'slug'     => $media->name(),
        // 'num'      => $media->indexOf(),
        'num'      => $media->sort()->value(),
        'template' => 'extra-file',
        'model'    => 'extra-file',
      ];
    }

    return Pages::factory($files, $this);
  }
}