<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 12/05/2015
 * Time: 01:03
 */

namespace FileHandlers;


use Abstracts\FileHandler;

class MusicXMLWriter extends FileHandler {

    private $writer;
    private $XMLFile;

    public function __construct(\XMLWriter $XMLWriter)
    {
        $this->writer = $XMLWriter;
    }

    protected function generateRawFile(){
        $this->XMLFile = '';

        //Start the document
        $this->startDocument();


        //End the document
        $this->endDocument();

        $this->rawFileContents = $this->XMLFile;
    }

    protected function startDocument()
    {
        $this->XMLFile .= $this->writer->startDocument(1.0,'UTF-8',"no");
    }

    protected function endDocument()
    {
        $this->XMLFile .= $this->writer->endDocument();
    }

}