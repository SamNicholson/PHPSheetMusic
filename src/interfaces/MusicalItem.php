<?php

namespace SNicholson\PHPSheetMusic\Interfaces;

/**
 * Interface MusicalItem
 * @package SNicholson\PHPSheetMusic\Interfaces
 */
interface MusicalItem
{

    /**
     * @return mixed
     */
    public function getLength();

    /**
     * @return mixed
     */
    public function getModifiers();
}
