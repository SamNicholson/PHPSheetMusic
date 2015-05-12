<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 12/05/2015
 * Time: 01:03
 */

namespace SNicholson\PHPSheetMusic\FileHandlers;


use SNicholson\PHPSheetMusic\Abstracts\FileHandler;

class MusicXMLGenerator extends FileHandler
{

    private $writer;
    private $XMLString;

    /**
     * @return mixed
     */
    public function getXMLString()
    {
        return $this->XMLString;
    }

    public function __construct(\XMLWriter $XMLWriter)
    {
        $this->writer = $XMLWriter;
        $this->writer->openMemory();
    }

    public function generateRawXML()
    {
        $this->XMLString = '';

        //Start the document
        $this->startDocument();

        $this->XMLString = $this->writer->outputMemory();
    }

    protected function startDocument()
    {
        $this->writer->startDocument("1.0", 'UTF-8', "no");
        $this->writer->startDTD(
            'score-partwise',
            '-//Recordare//DTD MusicXML 3.0 Partwise//EN',
            'http://www.musicxml.org/dtds/partwise.dtd'
        );
        $this->writer->endDocument();
        $this->writer->startElement('score-partwise');
            $this->writer->writeAttribute("version","3.0");
        $this->writer->endElement();
    }

    protected function setPartList()
    {
        $this->writer->startElement('part-list');

        $this->writer->endElement();
    }

}