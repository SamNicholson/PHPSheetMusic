<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 11/05/2015
 * Time: 23:30
 */

namespace SNicholson\PHPSheetMusic\Abstracts;


use SNicholson\PHPSheetMusic\Exceptions\FileHandlerException;

/**
 * Class FileHandler
 * @package Abstracts
 */
class FileHandler {

    /**
     * @var
     */
    protected $rawFileContents;
    /**
     * @var
     */
    protected $filePath;

    /**
     * @param $filePath
     * @throws FileHandlerException
     */
    public function openFile($filePath)
    {
        $this->filePath = $filePath;
        if(!file_exists($filePath)) {
            throw new FileHandlerException("Unable to open file $filePath");
        }
        $this->rawFileContents = file_get_contents($filePath);
    }

    /**
     * @param null $filePath
     * @return int
     */
    public function saveFile($filePath = null)
    {
        if($filePath === null) $filePath = $this->filePath;
        return file_put_contents($filePath,$this->rawFileContents);
    }

    /**
     *
     */
    protected function generateRawXML()
    {
        $this->rawFileContents = '';
    }

}