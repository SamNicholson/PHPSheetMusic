<?php
use SNicholson\PHPSheetMusic\Note;
use SNicholson\PHPSheetMusic\Rest;

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 19:24
 */

class RestTest extends PHPUnit_Framework_TestCase {

    public function test_simple_rest_returns_correct_length()
    {
        $rest = new Rest(Note::CROTCHET);
        $this->assertEquals($rest->getLength(),Note::CROTCHET);
        $this->assertEquals($rest->getModifiers(),NULL);
    }

    public function test_reset_with_modifier_returns_single_modifier_in_array()
    {
        $rest = new Rest(Note::CROTCHET, Note::DOTTED);
        $this->assertEquals($rest->getLength(),Note::CROTCHET);
        $this->assertEquals($rest->getModifiers(), [Note::DOTTED]);
    }

    public function test_a_rest_with_multiple_modifiers_returns_an_array()
    {
        $rest = new Rest(Note::CROTCHET, [Note::DOTTED, Note::TENUTO]);
        $this->assertEquals($rest->getLength(),Note::CROTCHET);
        $this->assertEquals($rest->getModifiers(), [Note::DOTTED, Note::TENUTO]);
    }

    public function test_a_no_property_reset_is_a_crotchet()
    {
        $rest = new Rest();
        $this->assertEquals($rest->getLength(),Note::CROTCHET);
    }

}
