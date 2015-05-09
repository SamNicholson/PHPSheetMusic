<?php
use SNicholson\PHPSheetMusic\TimeSignature;

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 21:07
 */

class TimeSignatureTest extends PHPUnit_Framework_TestCase {

    public function test_no_parameters_is_4_4()
    {
        $time = new TimeSignature();
        $this->assertEquals($time->getBeatLength(),1);
        $this->assertEquals($time->getBeatsPerBar(),4);
    }

    public function test_note_length_is_converted_to_decimal_storage()
    {
        $time = new TimeSignature(8,8);
        $this->assertEquals($time->getBeatsPerBar(),8);
        $this->assertEquals($time->getBeatLength(),0.5);
    }

}
