<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 20:33
 */

namespace SNicholson\PHPSheetMusic;

use SNicholson\PHPSheetMusic\Exceptions\InvalidBarLength;
use SNicholson\PHPSheetMusic\Interfaces\MusicalItem;

class Voice
{

    private $length = 0;
    private $numOfBars = 0;
    private $bars = [];

    private $timeSignature;
    private $keySignature;

    public function __construct(TimeSignature $timeSignature, KeySignature $keySignature)
    {
        $this->timeSignature = $timeSignature;
        $this->keySignature = $keySignature;
    }

    public function bar(MusicalItem ...$items)
    {
        $barLength = 0;
        foreach ($items AS $item) {
            /** @var MusicalItem $item */
            $barLength += $item->getLength();
        }
        if ($barLength != $this->timeSignature->getDecimalBeatsPerBar()) {
            throw new InvalidBarLength(
                "Bar submitted to piece did not match the required length of a bar for this voice, expected "
                . $this->timeSignature->getDecimalBeatsPerBar() . ' got ' . $barLength
            );
        }
        $this->length += $barLength;
        $this->bars[] = $items;
        return $this;
    }

    public function getNumOfBars()
    {
        $this->numOfBars = $this->length / $this->timeSignature->getDecimalBeatsPerBar();
        return $this->numOfBars;
    }

    public function getBarContents()
    {
        return $this->bars;
    }

}