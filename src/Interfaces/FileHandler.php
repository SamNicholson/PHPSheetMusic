<?php

namespace SNicholson\PHPSheetMusic\Interfaces;

/**
 * Interface FileHandler
 * @package interfaces
 */
interface FileHandler
{

    /**
     * @param $filePath
     * @return mixed
     */
    public function open($filePath);

    /**
     * @param null $filePath
     * @return mixed
     */
    public function save();

    /**
     * @param $filePath
     * @return mixed
     */
    public function saveAs($filePath);
}










