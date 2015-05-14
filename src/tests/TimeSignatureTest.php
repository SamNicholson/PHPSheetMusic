<?php

namespace SNicholson\PHPSheetMusic\Tests;

use PHPUnit_Framework_TestCase;
use SNicholson\PHPSheetMusic\TimeSignature;

/**
 * Class TimeSignatureTest
 * @package SNicholson\PHPSheetMusic\Tests
 */
class TimeSignatureTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test Test No Parameter's set gives 4 4
     */
    public function testNoParametersIs44()
    {
        $time = new TimeSignature();
        $this->assertEquals(4, $time->getBeatType());
        $this->assertEquals(4, $time->getBeatsPerBar());
    }

    /**
     * @test Test Note length is stored correctly
     */
    public function testNoteLengthIsStoredCorrectly()
    {
        $time = new TimeSignature(8, 8);
        $this->assertEquals(8, $time->getBeatsPerBar());
        $this->assertEquals(8, $time->getBeatType());
    }

    /**
     * @test Test That asking for decimal time works
     */
    public function testThatAskingForDecimalTimeWorks()
    {
        $time = new TimeSignature(4, 8);
        $this->assertEquals(2, $time->getDecimalBeatsPerBar());

        $time = new TimeSignature(3, 4);
        $this->assertEquals(3, $time->getDecimalBeatsPerBar());

        $time = new TimeSignature(2, 16);
        $this->assertEquals($time->getDecimalBeatsPerBar(), 0.5);

    }

}
