<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 11/05/2015
 * Time: 23:30
 */

namespace Abstracts;


use SNicholson\PHPSheetMusic\Exceptions\FileHandlerException;

class FileHandler {

    protected $rawFileContents;
    protected $filePath;

    public function openFile($filePath)
    {
        $this->filePath = $filePath;
        if(!file_exists($filePath)) {
            throw new FileHandlerException("Unable to open file $filePath");
        }
        $this->rawFileContents = file_get_contents($filePath);
    }

    public function saveFile($filePath = null)
    {
        if($filePath === null) $filePath = $this->filePath;
        return file_put_contents($filePath,$this->rawFileContents);
    }

}