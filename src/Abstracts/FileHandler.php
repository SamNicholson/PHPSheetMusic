<?php

namespace SNicholson\PHPSheetMusic\Abstracts;

use SNicholson\PHPSheetMusic\Exceptions\FileHandlerException;

/**
 * Class FileHandler
 * @package Abstracts
 */
abstract class FileHandler
{

    /**
     * The raw file
     * @var
     */
    protected $rawFileContents;
    /**
     * The path to the File
     * @var
     */
    protected $filePath;

    /**
     * Opens a file at the given file path
     * @param $filePath
     * @throws FileHandlerException
     */
    public function openFile($filePath)
    {
        $this->filePath = $filePath;
        if (!file_exists($filePath)) {
            throw new FileHandlerException("Unable to open file $filePath");
        }
        $this->rawFileContents = file_get_contents($filePath);
    }

    /**
     * Saves the file to the given filepath
     * @param null $filePath
     * @return int
     */
    public function saveFile($filePath = null)
    {
        if ($filePath === null) {
            $filePath = $this->filePath;
        }
        return file_put_contents($filePath, $this->rawFileContents);
    }

    /**
     * The method called to process the raw file
     */
    abstract protected function generateRawXML();
}
