<?php namespace Nexo\Filters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ImagesFilter implements FilterInterface
{

    public function applyFilter(Image $image)
    {
        return $image->fit(150, 150)->encode('png');
    }
}