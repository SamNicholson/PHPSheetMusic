<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 12/05/2015
 * Time: 21:38
 */

class MusicXMLGeneratorTest extends PHPUnit_Framework_TestCase {

    public function test_simple_xml_generated_is_in_correct_format()
    {

        $musicXMLWriter = new \SNicholson\PHPSheetMusic\FileHandlers\MusicXMLGenerator(new XMLWriter());
        $musicXMLWriter->generateRawXML();
//        $this->assertEquals(file_get_contents(__DIR__.'/XMLFiles/sampleMusicXML.xml'),$musicXMLWriter->getXMLString());

    }

}
