<?php
use SNicholson\PHPSheetMusic\Part;
use SNicholson\PHPSheetMusic\Piece;

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 12/05/2015
 * Time: 22:51
 */

class PieceTest extends PHPUnit_Framework_TestCase {

    public function test_piece_returns_voices_correctly()
    {
        $piece = new Piece();
        $mock = $this->getMockBuilder('SNicholson\PHPSheetMusic\Part')->disableOriginalConstructor()->getMock();
        $piece->setParts(
            $mock
        );
        $this->assertEquals([$mock], $piece->getParts());
    }

}
