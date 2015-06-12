<?php
use SNicholson\PHPSheetMusic\KeySignature;
use SNicholson\PHPSheetMusic\Note;

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 22:15
 */
class KeySignatureTest extends PHPUnit_Framework_TestCase
{

    public function test_key_signature_converts_notes_pitch_properly_in_D()
    {
        $note = new \SNicholson\PHPSheetMusic\Note(Note::F);
        $keySignature = new KeySignature(KeySignature::$d);
        $this->assertEquals($keySignature->getNoteDecimalPitch($note), (2.5 + 0.5));
    }

    public function test_key_signature_converts_notes_pitch_properly_in_F()
    {
        $note = new \SNicholson\PHPSheetMusic\Note(Note::B);
        $keySignature = new KeySignature(KeySignature::$f);
        $this->assertEquals($keySignature->getNoteDecimalPitch($note), (-0.5 - 0.5));
    }

    public function test_key_signature_converts_notes_pitch_properly_in_C_SHARP()
    {
        $note = new \SNicholson\PHPSheetMusic\Note(Note::C);
        $keySignature = new KeySignature(KeySignature::$cSharp);
        $this->assertEquals($keySignature->getNoteDecimalPitch($note), (0 + 0.5));
    }

    public function test_note_with_natural_modifier_is_not_affected_by_key_signature()
    {
        $note = new \SNicholson\PHPSheetMusic\Note(Note::B, Note::CROTCHET, Note::NATURAL);
        $keySignature = new KeySignature(KeySignature::$f);
        $this->assertEquals(-0.5, $keySignature->getNoteDecimalPitch($note));
    }

}
