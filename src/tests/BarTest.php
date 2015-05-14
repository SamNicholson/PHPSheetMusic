<?php

namespace SNicholson\PHPSheetMusic\Tests;

use PHPUnit_Framework_TestCase;
use SNicholson\PHPSheetMusic\Exceptions\InvalidBarLength;
use SNicholson\PHPSheetMusic\KeySignature;
use SNicholson\PHPSheetMusic\Note;
use SNicholson\PHPSheetMusic\Rest;
use SNicholson\PHPSheetMusic\TimeSignature;
use SNicholson\PHPSheetMusic\Bar;

/**
 * Class BarTest
 */
class BarTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test Test that a invalid bar length throws exception
     */
    public function testThatInvalidBarLengthThrowsException()
    {
        $timeSig = new TimeSignature(3, 4);
        $keySig = new KeySignature(KeySignature::$c);
        $measure = new Bar($keySig);
        $measure->setTimeSignature($timeSig);
        $caught = false;
        try {
            $measure->addMusicalItems(new Note(Note::C, Note::CROTCHET), new Rest(Note::QUAVER));
            $measure->getBarContents();
        } catch (InvalidBarLength $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
    }

    /**
     * @test Test that bar contents accepts Notes and Rests
     * @throws InvalidBarLength
     */
    public function testBarContentsAcceptsNotesAndRests()
    {
        $timeSig = new TimeSignature(3, 8);
        $keySig = new KeySignature(KeySignature::$c);
        $measure = new Bar($keySig);
        $measure->setTimeSignature($timeSig);
        $note = new Note(Note::C, Note::CROTCHET);
        $rest = new Rest(Note::QUAVER);
        $measure->addMusicalItems($note, $rest);
        $this->assertEquals([$note, $rest], $measure->getBarContents());
    }

    /**
     * @test Test Multiple musical item addition works as expected
     * @throws InvalidBarLength
     */
    public function testMultipleMusicalItemAdditionWorksAsExpected()
    {
        $timeSig = new TimeSignature(3, 8);
        $keySig = new KeySignature(KeySignature::$c);
        $measure = new Bar($keySig);
        $measure->setTimeSignature($timeSig);
        $note = new Note(Note::C, Note::CROTCHET);
        $rest = new Rest(Note::QUAVER);
        $measure->addMusicalItems($note);
        $measure->addMusicalItems($rest);
        $this->assertEquals([$note, $rest], $measure->getBarContents());
    }
}
