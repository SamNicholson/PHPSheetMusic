<?php

namespace SNicholson\PHPSheetMusic\MusicXML;

use SNicholson\PHPSheetMusic\Interfaces\MusicalItem;
use SNicholson\PHPSheetMusic\Note;
use SNicholson\PHPSheetMusic\Part;
use SNicholson\PHPSheetMusic\Piece;
use SNicholson\PHPSheetMusic\Bar;
use XMLWriter;

/**
 * Class MusicXMLGenerator
 * @package SNicholson\PHPSheetMusic\FileHandlers
 */
class MusicXMLGenerator
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
                $this->generateMeasure($part, $measures);
            }
            $this->writer->endElement();
        }
    }

    /**
     * @param Part $part
     * @param Bar $bar
     */
    protected function generateMeasure(Part $part, Bar $bar)
    {
        //Write the measure element
        $this->writer->startElement('measure');
        $this->writer->writeAttribute('number', $this->currentMeasureNumber);

        //Write the measures attributes
        $this->writer->startElement('attributes');
        $this->writer->writeElement(
            'divisions',
            $bar->getTimeSignature()->getXMLDivisions()
        );

        $this->writer->startElement('key');
        $this->writer->writeElement('fifths', $bar->getKeySignature()->generateXMLFifths());
        $this->writer->endElement();

        $this->writer->startElement('time');
        $this->writer->writeElement('beats', $bar->getTimeSignature()->getBeatsPerBar());
        $this->writer->writeElement('beat-type', $bar->getTimeSignature()->getBeatType());
        $this->writer->endElement();

        $this->writer->startElement('clef');
        $this->writer->writeElement('sign', $part->generateXMLSign());
        $this->writer->writeElement('line', $part->generateXMLLine());
        $this->writer->endElement();

        //End the attributes element
        $this->writer->endElement();

        /** @var MusicalItem $musicalItem */
        foreach ($bar->getBarContents() as $musicalItem) {
            $this->generateMusicalItem($musicalItem);
        }
        $bar->getBarContents();
    }

    protected function incrementMeasureNumber()
    {
        ++$this->currentMeasureNumber;
    }

    /**
     * Draws a musical item in the XML
     * @param MusicalItem|Note $musicalItem
     */
    protected function generateMusicalItem(Note $musicalItem)
    {
        $this->writer->startElement('note');
            $this->writer->startElement('pitch');
                $this->writer->writeElement('step', $musicalItem->getNoteName());
                $this->writer->writeElement('octave', $musicalItem->getOctave());
            $this->writer->endElement();
            $this->writer->writeElement('duration', $musicalItem->getLength());
            $this->writer->writeElement('type', $musicalItem->getNoteType());
        $this->writer->endElement();
    }
}
