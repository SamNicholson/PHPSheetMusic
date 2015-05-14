<?php

namespace SNicholson\PHPSheetMusic\FileHandlers;

use SNicholson\PHPSheetMusic\Abstracts\FileHandler;
use SNicholson\PHPSheetMusic\Interfaces\MusicalItem;
use SNicholson\PHPSheetMusic\Part;
use SNicholson\PHPSheetMusic\Piece;
use SNicholson\PHPSheetMusic\Bar;
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
     * @var
     */
    protected $currentMeasureNumber = 0;

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

        //Generate the individual parts
        $this->generateParts();

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

    /**
     *
     */
    protected function generateParts()
    {
        /** @var Part $part */
        foreach ($this->parts as $part) {
            $this->writer->startElement('part');
            $this->writer->writeAttribute('id', $part->getId());
            /** @var Bar $measures */
            foreach ($part->getBars() as $measures) {
                $this->incrementMeasureNumber();
                $this->generateMeasure($measures);
            }

            $this->writer->endElement();
        }
    }

    /**
     * @param Bar $bar
     */
    protected function generateMeasure(Bar $bar)
    {
        //Write the measure element
        $this->writer->startElement('measure');
        $this->writer->writeAttribute('number', $this->currentMeasureNumber);

        //Write the measures attributes


        /** @var MusicalItem $musicalItem */
        foreach ($bar->getBarContents() as $musicalItem) {
            $this->generateMusicalItem($musicalItem);
        }
        $this->writer->endElement();
        $bar->getBarContents();
    }

    protected function incrementMeasureNumber()
    {
        ++$this->currentMeasureNumber;
    }

    /**
     * Draws a musical item in the XML
     * @param MusicalItem $musicalItem
     */
    protected function generateMusicalItem(MusicalItem $musicalItem)
    {
        $this->writer->startElement('note');
        $this->writer->endElement();
    }
}
