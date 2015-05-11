<?php
use SNicholson\PHPSheetMusic\Part;

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 11/05/2015
 * Time: 20:50
 */

class PartTest extends PHPUnit_Framework_TestCase {

    public function test_stave_returns_name_correctly()
    {
        $stave = new Part(Part::TREBLE,'PART1');

        $this->assertEquals(Part::TREBLE,$stave->getStaveType());
        $this->assertEquals('PART1',$stave->getId());

    }

}
