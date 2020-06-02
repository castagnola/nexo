<?php namespace Nexo\Filters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ImagesFilterXS implements FilterInterface
{

    public function applyFilter(Image $image)
    {
        $size = 50;
        return $image->fit($size, $size)->encode('jpg');
    }
}