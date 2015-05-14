<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 20:53
 */

namespace SNicholson\PHPSheetMusic;

/**
 * Class TimeSignature
 * @package SNicholson\PHPSheetMusic
 */
class TimeSignature
{

    /**
     * The beat length, is stored in decimal e.g. crotchet = 1, quaver = 0.5
     * @var float
     */
    private $beatType;

    /**
     * The number of beats per bar
     * @var int
     */
    private $beatsPerBar;


    /**
     * Recieves beats per bar and beat length
     * @param int $beatsPerBar
     * @param int $beatType
     * @internal param int $beatLength
     */
    public function __construct($beatsPerBar = 4, $beatType = 4)
    {
        $this->beatsPerBar = $beatsPerBar;
        $this->beatType = $beatType;
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
    public function getBeatType()
    {
        return $this->beatType;
    }

    /**
     * @return float
     */
    public function getDecimalBeatsPerBar()
    {
        return ((1 / $this->beatType) * 4) * $this->beatsPerBar;
    }

    /**
     * @return int
     */
    public function getXMLDivisions()
    {
        return 1;
    }
}
