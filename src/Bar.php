<?php

namespace SNicholson\PHPSheetMusic;

use SNicholson\PHPSheetMusic\Exceptions\InvalidBarLength;
use SNicholson\PHPSheetMusic\Interfaces\MusicalItem;

/**
 * Class Bar
 * @package SNicholson\PHPSheetMusic
 */
class Bar
{

    /**
     * @var int
     */
    private $length = 0;
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
     * Takes the known key signature
     * @param KeySignature $keySignature
     */
    public function __construct(KeySignature $keySignature)
    {
        $this->keySignature = $keySignature;
        $this->timeSignature = new TimeSignature();
    }

    /**
     * @param TimeSignature $timeSignature
     */
    public function setTimeSignature(TimeSignature $timeSignature)
    {
        $this->timeSignature = $timeSignature;
    }

    /**
     * @param MusicalItem ...$items
     * @return $this
     * @throws InvalidBarLength
     */
    public function addMusicalItems(MusicalItem ...$items)
    {
        $barLength = 0;
        foreach ($items as $item) {
            /** @var MusicalItem $item */
            $barLength += $item->getLength();
            $this->bars[] = $item;
        }
        $this->length += $barLength;
        return $this;
    }

    /**
     * @return array
     */
    public function getBarContents()
    {
        $this->checkBarContentLength();
        return $this->bars;
    }

    private function checkBarContentLength()
    {
        if ($this->length != $this->timeSignature->getDecimalBeatsPerBar()) {
            throw new InvalidBarLength(
                "Bar submitted to piece did not match the required length of a bar for this voice, expected "
                . $this->timeSignature->getDecimalBeatsPerBar() . ' got ' . $this->length
            );
        }
    }
}
