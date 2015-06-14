<?php

namespace SNicholson\PHPSheetMusic\FileHandlers;

use PHPUnit_Framework_TestCase;
use SNicholson\PHPSheetMusic\Exceptions\FileHandlerException;
use XMLReader;
use XMLWriter;

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 14/06/2015
 * Time: 17:06
 */
class XMLFileTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test Test Open Throws Exception When No File Found
     */
    public function testOpenThrowsExceptionWhenNoFileFound()
    {
        $shouldBeTrue = false;
        try {
            $file = new XMLFile();
            $file->open('test');
        } catch (FileHandlerException $e) {
            $shouldBeTrue = true;
        }
        $this->assertTrue($shouldBeTrue);
    }

    /**
     * @test Test Open File Opens the Correct File
     */
    public function testOpenFileOpensTheCorrectFile()
    {
        $filePath = __DIR__ . '\XMLFiles\sampleMusicXML.xml';
        $file = new XMLFile();
        $file->open($filePath);
        $this->assertEquals(file_get_contents($filePath), $file->getFileContents());
    }

    /**
     * @test Test Save function overwrites original file
     */
    public function testSaveFunctionOverwritesOriginalFile()
    {
        $saveFilePath = __DIR__ . '\TestFileOutput\testFile.xml';
        $fileContents = 'A Test File';
        $changedFileContents = 'I changed the file contents';

        file_put_contents($saveFilePath, $fileContents);

        $file = new XMLFile();
        $file->open($saveFilePath);
        $file->setFileContents($changedFileContents);
        $file->save();

        $this->assertEquals($changedFileContents, file_get_contents($saveFilePath));
    }

    /**
     * @test Test Save As Saves contents into new file
     */
    public function testSaveAsSavesContentsIntoNewFile()
    {
        $saveFilePath = __DIR__ . '\TestFileOutput\testFile.xml';
        $newSaveFilePath = __DIR__ . '\TestFileOutput\testFileSaveAs.xml';
        $fileContents = 'A Test File';
        $changedFileContents = 'I changed the file contents';

        file_put_contents($saveFilePath, $fileContents);
        file_put_contents($newSaveFilePath, $fileContents);

        $file = new XMLFile();
        $file->open($saveFilePath);
        $file->setFileContents($changedFileContents);
        $file->saveAs($newSaveFilePath);

        $this->assertEquals($changedFileContents, file_get_contents($newSaveFilePath));
    }

}
