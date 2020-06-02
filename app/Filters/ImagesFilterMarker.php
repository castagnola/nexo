<?php namespace Nexo\Filters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ImagesFilterMarker implements FilterInterface
{

    public function applyFilter(Image $image)
    {
        $size = 32;
        return $image->fit($size, $size)->encode('jpg');
    }
}