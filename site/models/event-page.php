<?php

class EventPagePage extends Page
{
  public function children(): Kirby\Cms\Pages
  {
    $images = [];

    foreach ($this->images()->template('media-file') as $image) {
      $images[] = [
        'slug'     => $image->name(),
        'num'      => $image->sort()->value(),
        'template' => 'media-file',
        'model'    => 'media-file',
      ];
    }

    return Pages::factory($images, $this);
  }
}