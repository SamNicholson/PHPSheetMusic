<?php
use SNicholson\PHPSheetMusic\Part;

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 11/05/2015
 * Time: 20:50
 */
class PartTest extends PHPUnit_Framework_TestCase
{

    public function test_stave_returns_name_correctly()
    {
        $part = new Part(Part::TREBLE, 'PART1');

        $this->assertEquals(Part::TREBLE, $part->getStaveType());
        $this->assertEquals('PART1', $part->getId());

    }

    public function test_stave_returns_voices_correctly()
    {
        $part = new Part(Part::TREBLE, 'PART1');
        $mock = $this->getMockBuilder('SNicholson\PHPSheetMusic\Voice')->disableOriginalConstructor()->getMock();
        $part->setVoices(
            $mock
        );
        $this->assertEquals(Part::TREBLE, $part->getStaveType());
        $this->assertEquals([$mock], $part->getVoices());
    }

}
