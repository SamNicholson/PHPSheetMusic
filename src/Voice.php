<?php

namespace SNicholson\PHPSheetMusic;

use SNicholson\PHPSheetMusic\Exceptions\InvalidBarLength;
use SNicholson\PHPSheetMusic\Interfaces\MusicalItem;

/**
 * Class Voice
 * @package SNicholson\PHPSheetMusic
 */
class Voice
{

    /**
     * @var int
     */
    private $length = 0;
    /**
     * @var int
     */
    private $numOfBars = 0;
    /**
     * @var array
     */
    private $bars = [];

    /**
     * @var TimeSignature
     */
    private $timeSignature;
    /**
     * @var KeySignature
     */
    private $keySignature;

    /**
     * @param TimeSignature $timeSignature
     * @param KeySignature $keySignature
     */
    public function __construct(TimeSignature $timeSignature, KeySignature $keySignature)
    {
        $this->timeSignature = $timeSignature;
        $this->keySignature = $keySignature;
    }

    /**
     * @param MusicalItem ...$items
     * @return $this
     * @throws InvalidBarLength
     */
    public function bar(MusicalItem ...$items)
    {
        $barLength = 0;
        foreach ($items as $item) {
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

    /**
     * @return float|int
     */
    public function getNumOfBars()
    {
        $this->numOfBars = $this->length / $this->timeSignature->getDecimalBeatsPerBar();
        return $this->numOfBars;
    }

    /**
     * @return array
     */
    public function getBarContents()
    {
        return $this->bars;
    }
}
