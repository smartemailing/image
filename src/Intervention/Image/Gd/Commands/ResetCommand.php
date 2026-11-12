<?php

namespace Intervention\Image\Gd\Commands;

use Intervention\Image\Commands\AbstractCommand;
use Intervention\Image\Exception\RuntimeException;

class ResetCommand extends AbstractCommand
{
    /**
     * Resets given image to its backup state
     *
     * @param  \Intervention\Image\Image $image
     * @return boolean
     */
    public function execute($image)
    {
        $backupName = $this->argument(0)->value();
        $backup = $image->getBackup($backupName);
        
        if (is_resource($backup) || $backup instanceof \GdImage) {

            // clone backup
            $backup = $image->getDriver()->cloneCore($backup);

            // reset to new resource
            $image->setCore($backup);

            return true;
        }

        throw new RuntimeException(
            "Backup not available. Call backup() before reset()."
        );
    }
}
