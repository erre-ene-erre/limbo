<?php

class ExtraFilePage extends Page
{
  public function image(string $filename = null): Kirby\Cms\File|null
  {
    if (!$filename) {
      return $this->parent()->files()->template('extra-file')->findBy('name', $this->slug());
    }

    return parent::image($filename);
  }
}