<?php

namespace SNicholson\PHPSheetMusic\Tests;

use PHPUnit_Framework_TestCase;
use SNicholson\PHPSheetMusic\FileHandlers\MusicXMLGenerator;
use SNicholson\PHPSheetMusic\KeySignature;
use SNicholson\PHPSheetMusic\Bar;
use SNicholson\PHPSheetMusic\MF;
use SNicholson\PHPSheetMusic\Note;
use SNicholson\PHPSheetMusic\Part;
use SNicholson\PHPSheetMusic\Piece;
use SNicholson\PHPSheetMusic\TimeSignature;
use XMLWriter;

/**
 * Class MusicXMLGeneratorTest
 */
class MusicXMLGeneratorTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test Test Simple XML Generated is in the correct format
     */
    public function testSimpleXMLGeneratedItIsInCorrectFormat()
    {
        $keySignature = new KeySignature(KeySignature::$c);
        $timeSignature = new TimeSignature(4, 4);
        $piece = new Piece();

        $part = new Part(Part::TREBLE, 'Music', 'P1');

        $bar = new Bar($keySignature);
        $bar->setTimeSignature($timeSignature);
        $bar->addMusicalItems(MF::semiBreve(Note::C));

        $part->setBars($bar);
        $piece->setParts($part);

        $musicXMLWriter = new MusicXMLGenerator($piece, new XMLWriter());
        $musicXMLWriter->generateRawXML();
        $this->assertEquals(
            file_get_contents(__DIR__ . '/XMLFiles/sampleMusicXML.xml'),
            $musicXMLWriter->getXMLString()
        );

    }
}
