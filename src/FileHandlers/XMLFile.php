<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 14/06/2015
 * Time: 00:45
 */

namespace SNicholson\PHPSheetMusic\FileHandlers;

use SNicholson\PHPSheetMusic\Exceptions\FileHandlerException;
use SNicholson\PHPSheetMusic\Interfaces\FileHandler;
use XMLReader;
use XMLWriter;

/**
 * Class XMLFile
 * @package SNicholson\PHPSheetMusic\FileHandlers
 */
class XMLFile implements FileHandler
{

    /**
     * The raw file
     * @var
     */
    protected $rawFileContents;

    /**
     * @var
     */
    private $filePath;

    /**
     * @param $fileContents
     */
    public function setFileContents($fileContents)
    {
        $this->rawFileContents = $fileContents;
    }

    /**
     * @return mixed
     */
    public function getFileContents()
    {
        return $this->rawFileContents;
    }

    /**
     * @param $filePath
     * @return mixed|void
     * @throws FileHandlerException
     */
    public function open($filePath)
    {
        $this->filePath = $filePath;
        if (!file_exists($filePath)) {
            throw new FileHandlerException("Unable to open file $filePath");
        }
        $this->setFileContents(file_get_contents($filePath));
    }

    /**
     * @param $filePath
     * @return int
     */
    public function saveAs($filePath)
    {
        return $this->saveProcessing($filePath);
    }

    /**
     * @return int
     */
    public function save()
    {
        return $this->saveProcessing($this->filePath);
    }

    /**
     * @param $filePath
     * @return int
     * @internal param $filepath
     */
    private function saveProcessing($filePath)
    {
        return file_put_contents($filePath, $this->rawFileContents);
    }
}
