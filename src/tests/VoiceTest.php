<?php
use SNicholson\PHPSheetMusic\KeySignature;
use SNicholson\PHPSheetMusic\Note;
use SNicholson\PHPSheetMusic\Rest;
use SNicholson\PHPSheetMusic\TimeSignature;
use SNicholson\PHPSheetMusic\Voice;

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 10/05/2015
 * Time: 17:36
 */

class VoiceTest extends PHPUnit_Framework_TestCase {

    public function test_voice_calculates_number_of_bars_correctly()
    {
        $timeSig = new TimeSignature(3,4);
        $keySig = new KeySignature(KeySignature::$c);
        $voice = new Voice($timeSig,$keySig);
        $voice->addNote(new Note(Note::C,Note::CROTCHET));
        $voice->addRest(new Rest(Note::QUAVER));
        $this->assertEquals(0.5,$voice->getNumOfBars());
    }

    public function test_get_bar_contents_works_with_notes_and_rests()
    {
        $timeSig = new TimeSignature(3,4);
        $keySig = new KeySignature(KeySignature::$c);
        $voice = new Voice($timeSig,$keySig);
        $note = new Note(Note::C,Note::CROTCHET);
        $voice->addNote($note);
        $rest = new Rest(Note::QUAVER);
        $voice->addRest($rest);
        $this->assertEquals([$note,$rest],$voice->getBarContents());
    }

}
