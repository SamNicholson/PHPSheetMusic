<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 20:33
 */

namespace SNicholson\PHPSheetMusic;

class Voice
{

    private $length = 0;
    private $numOfBars = 0;
    private $barContents = [];

    private $timeSignature;
    private $keySignature;

    public function __construct(TimeSignature $timeSignature, KeySignature $keySignature)
    {
        $this->timeSignature = $timeSignature;
        $this->keySignature = $keySignature;
    }

    public function addNote(Note $note)
    {
        $this->barContents[] = $note;
        $this->length += $note->getLength();
    }

    public function addRest(Rest $rest)
    {
        $this->barContents[] = $rest;
        $this->length += $rest->getLength();
    }

    public function getNumOfBars()
    {
        $this->numOfBars = $this->length / $this->timeSignature->getDecimalBeatsPerBar();
        return $this->numOfBars;
    }

    public function getBarContents()
    {
        return $this->barContents;
    }

}