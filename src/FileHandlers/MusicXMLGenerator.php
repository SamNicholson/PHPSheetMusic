<?php

namespace SNicholson\PHPSheetMusic\FileHandlers;

use SNicholson\PHPSheetMusic\Abstracts\FileHandler;
use SNicholson\PHPSheetMusic\Part;
use SNicholson\PHPSheetMusic\Piece;
use XMLWriter;

/**
 * Class MusicXMLGenerator
 * @package SNicholson\PHPSheetMusic\FileHandlers
 */
class MusicXMLGenerator extends FileHandler
{
    /**
     * @var Piece
     */
    protected $piece;
    /**
     * @var mixed
     */
    protected $parts;

    /**
     * @var XMLWriter
     */
    private $writer;
    /**
     * @var
     */
    private $XMLString;

    /**
     * @return mixed
     */
    public function getXMLString()
    {
        return $this->XMLString;
    }

    /**
     * Constructor for MusicXMLGenerator
     * @param Piece $piece
     * @param XMLWriter $XMLWriter
     */
    public function __construct(Piece $piece, XMLWriter $XMLWriter)
    {
        $this->piece = $piece;
        $this->parts = $this->piece->getParts();
        $this->writer = $XMLWriter;
        $this->writer->openMemory();
    }

    /**
     *
     */
    public function generateRawXML()
    {
        $this->XMLString = '';

        //Start the document
        $this->startDocument();

        //Generate the part list
        $this->setPartList();

        //Close left over elements
        $this->endDocument();

        $this->XMLString = $this->writer->outputMemory();
    }

    /**
     * Generate the start of the XML document
     */
    protected function startDocument()
    {
        $this->writer->startDocument("1.0", 'UTF-8', "no");
        $this->writer->setIndent(true);
        $this->writer->setIndentString('    ');
        $this->writer->startDTD(
            'score-partwise',
            '-//Recordare//DTD MusicXML 3.0 Partwise//EN',
            'http://www.musicxml.org/dtds/partwise.dtd'
        );
        $this->writer->endDocument();
        $this->writer->startElement('score-partwise');
        $this->writer->writeAttribute("version", "3.0");

    }

    /**
     * Closes any elements which are left open
     */
    protected function endDocument()
    {
        $this->writer->endElement();
    }

    /**
     * Generate the XML part list chunk
     */
    protected function setPartList()
    {
        $this->writer->startElement('part-list');
        /** @var Part $part */
        foreach ($this->parts as $part) {
            $this->writer->startElement('score-part');
            $this->writer->writeAttribute('id', $part->getId());
            $this->writer->writeElement('part-name', $part->getName());
            $this->writer->endElement();
        }
        $this->writer->endElement();
    }
}
