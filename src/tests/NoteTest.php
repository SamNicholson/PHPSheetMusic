<?php

use SNicholson\PHPSheetMusic\Note;

class NoteTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test that a simple note with no modifiers can be created
     */
    public function test_that_a_simple_note_can_be_defined()
    {
        $note = new Note(Note::A, Note::CROTCHET);

        $this->assertEquals($note->getLength(), Note::CROTCHET);
        $this->assertEquals($note->getPitch(), -1.5);
        $this->assertEquals($note->getModifiers(), []);
    }

    /**
     * Test that a simple note with a single modifier (a string) returns in the right format
     */
    public function test_a_note_width_modifier_returns_modifier()
    {
        $note = new Note(Note::B, Note::MINIM, Note::TENUTO);

        $this->assertEquals($note->getLength(), Note::MINIM);
        $this->assertEquals($note->getPitch(), -0.5);
        $this->assertEquals($note->getModifiers(), [Note::TENUTO]);
    }

    /**
     * Test that a simple note with an array of multipliers returns them in the correct format
     */
    public function test_a_note_with_multiple_modifiers_returns_them_all()
    {
        $note = new Note(Note::B, Note::MINIM, [Note::TENUTO, Note::STACCATO]);

        $this->assertEquals($note->getLength(), Note::MINIM);
        $this->assertEquals($note->getPitch(), -0.5);
        $this->assertEquals($note->getModifiers(), [Note::TENUTO, Note::STACCATO]);
    }
    /**
     * Test a note with no properties except pitch is a crotected
     */
    public function test_a_note_with_only_pitch_is_crotchet()
    {
        $note = new Note(Note::B);

        $this->assertEquals($note->getLength(), Note::CROTCHET);
        $this->assertEquals($note->getPitch(), -0.5);
    }

    /**
     * This checks that notes with flat modifier have their pitch lowered by a half
     */
    public function test_a_note_with_sharp_has_pitch_raised()
    {
        $note = new Note(Note::B,Note::CROTCHET,Note::SHARP);

        $this->assertEquals($note->getLength(), Note::CROTCHET);
        $this->assertEquals($note->getPitch(), -0.5 + 0.5);
    }


    /**
     * This checks that notes with sharp modifier have their pitch raised by a half
     */
    public function test_a_note_with_flat_has_pitch_lowered()
    {
        $note = new Note(Note::B,Note::CROTCHET,Note::FLAT);

        $this->assertEquals($note->getLength(), Note::CROTCHET);
        $this->assertEquals($note->getPitch(), -0.5 - 0.5);
    }

    /**
     * This checks that a dotted note has its length multiplied by 1.5
     */
    public function test_dotted_modifier_increases_length_correctly()
    {
        $note = new Note(Note::B,Note::CROTCHET,Note::DOTTED);

        $this->assertEquals($note->getLength(), (Note::CROTCHET * 1.5));
    }

}
