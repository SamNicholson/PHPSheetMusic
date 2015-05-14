<?php

namespace SNicholson\PHPSheetMusic\Tests;

use PHPUnit_Framework_TestCase;
use SNicholson\PHPSheetMusic\Part;

/**
 * Class PartTest
 */
class PartTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test Test part returns name correctly
     */
    public function testPartReturnsNameCorrectly()
    {
        $part = new Part(Part::TREBLE, 'PART1', 'id');

        $this->assertEquals(Part::TREBLE, $part->getStaveType());
        $this->assertEquals('PART1', $part->getName());
        $this->assertEquals('id', $part->getId());

    }

    /**
     * @test Test part returns voices correctly
     */
    public function testPartReturnsVoicesCorrectly()
    {
        $part = new Part(Part::TREBLE, 'PART1', 'id');
        $mock = $this->getMockBuilder('SNicholson\PHPSheetMusic\Bar')->disableOriginalConstructor()->getMock();
        $this->assertEquals([], $part->getBars());
        $part->setBars(
            $mock
        );
        $this->assertEquals(Part::TREBLE, $part->getStaveType());
        $this->assertEquals([$mock], $part->getBars());
    }
}
