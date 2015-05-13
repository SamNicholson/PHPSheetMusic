<?php

namespace SNicholson\PHPSheetMusic\Tests;

use PHPUnit_Framework_TestCase;
use SNicholson\PHPSheetMusic\FileHandlers\MusicXMLGenerator;
use SNicholson\PHPSheetMusic\KeySignature;
use SNicholson\PHPSheetMusic\Measure;
use SNicholson\PHPSheetMusic\Part;
use SNicholson\PHPSheetMusic\Piece;
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
        $keySignautre = new KeySignature(KeySignature::$c);
        $piece = new Piece();
        $piece->setParts(new Part(Part::TREBLE, 'Music', 'P1'));
//        $measure = new Measure();

        $musicXMLWriter = new MusicXMLGenerator($piece, new XMLWriter());
        $musicXMLWriter->generateRawXML();
        $this->assertEquals(
            file_get_contents(__DIR__ . '/XMLFiles/sampleMusicXML.xml'),
            $musicXMLWriter->getXMLString()
        );

    }
}
