<?php

namespace Intervention\Image\Gd\Commands;

use Intervention\Image\Commands\AbstractCommand;

class DestroyCommand extends AbstractCommand
{
    /**
     * Destroys current image core and frees up memory
     *
     * @param  \Intervention\Image\Image $image
     * @return boolean
     */
    public function execute($image)
    {
        // GD images are objects since PHP 8.0 and are freed once no longer referenced

        return true;
    }
}
