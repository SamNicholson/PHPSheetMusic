<?php
use SNicholson\PHPSheetMusic\Exceptions\InvalidBarLength;
use SNicholson\PHPSheetMusic\KeySignature;
use SNicholson\PHPSheetMusic\Note;
use SNicholson\PHPSheetMusic\Rest;
use SNicholson\PHPSheetMusic\TimeSignature;
use SNicholson\PHPSheetMusic\Measure;

class MeasureTest extends PHPUnit_Framework_TestCase
{

    public function test_that_invalid_bar_length_throws_exception()
    {
        $timeSig = new TimeSignature(3, 4);
        $keySig = new KeySignature(KeySignature::$c);
        $measure = new Measure($keySig);
        $measure->setTimeSignature($timeSig);
        $caught = false;
        try {
            $measure->bar(new Note(Note::C, Note::CROTCHET), new Rest(Note::QUAVER));
        } catch (InvalidBarLength $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
    }

    public function test_voice_calculates_number_of_bars_correctly()
    {
        $timeSig = new TimeSignature(1, 4);
        $keySig = new KeySignature(KeySignature::$c);
        $measure = new Measure($keySig);
        $measure->setTimeSignature($timeSig);
        $measure->bar(new Note(Note::C, Note::CROTCHET));
        $measure->bar(new Note(Note::C, Note::CROTCHET));
        $this->assertEquals(2, $measure->getNumOfBars());
    }

    public function test_get_bar_contents_works_with_notes_and_rests()
    {
        $timeSig = new TimeSignature(3, 8);
        $keySig = new KeySignature(KeySignature::$c);
        $measure = new Measure($keySig);
        $measure->setTimeSignature($timeSig);
        $note = new Note(Note::C, Note::CROTCHET);
        $rest = new Rest(Note::QUAVER);
        $measure->bar($note, $rest);
        $this->assertEquals([[$note, $rest]], $measure->getBarContents());
    }

    public function test_multiple_bars_are_stored_and_retrieved_properly()
    {
        $timeSig = new TimeSignature(3, 8);
        $keySig = new KeySignature(KeySignature::$c);
        $measure = new Measure($keySig);
        $measure->setTimeSignature($timeSig);
        $note = new Note(Note::C, Note::CROTCHET);
        $rest = new Rest(Note::QUAVER);
        $measure->bar($note, $rest);
        $measure->bar($rest, $note);
        $this->assertEquals([[$note, $rest], [$rest, $note]], $measure->getBarContents());
    }

}
