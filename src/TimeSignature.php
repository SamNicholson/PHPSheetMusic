<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 20:53
 */

namespace SNicholson\PHPSheetMusic;

class TimeSignature {

    /**
     * The beat length, is stored in decimal e.g. crotchet = 1, quaver = 0.5
     * @var float
     */
    private $beatLength;

    /**
     * The number of beats per bar
     * @var int
     */
    private $beatsPerBar;


    /**
     * Recieves beats per bar and beat length
     * @param int $beatsPerBar
     * @param int $beatLength
     */
    public function __construct($beatsPerBar = 4, $beatLength = 4)
    {
        $this->beatsPerBar = $beatsPerBar;
        $this->beatLength = (1 / $beatLength) * 4;
    }
    /**
     * @return int
     */
    public function getBeatsPerBar()
    {
        return $this->beatsPerBar;
    }

    /**
     * @return float
     */
    public function getBeatLength()
    {
        return $this->beatLength;
    }

    public function getDecimalBeatsPerBar()
    {
        return $this->beatLength * $this->beatsPerBar;
    }

}