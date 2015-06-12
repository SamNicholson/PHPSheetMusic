<?php

namespace SNicholson\PHPSheetMusic;

/**
 * Class Octave
 * @package SNicholson\PHPSheetMusic
 */
class Octave
{

    /**
     * @var int
     */
    private $octave;

    /**
     * @param int $octave
     */
    public function __construct($octave = 0)
    {
        $this->octave = $octave;
    }


    /**
     * @return Octave
     */
    public static function lowest()
    {
        return new Octave(2);
    }

    /**
     * @return Octave
     */
    public static function lower()
    {
        return new Octave(3);
    }

    /**
     * @return Octave
     */
    public static function middle()
    {
        return new Octave(4);
    }

    /**
     * @return Octave
     */
    public static function higher()
    {
        return new Octave(5);
    }

    /**
     * @return Octave
     */
    public static function highest()
    {
        return new Octave(6);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->octave;
    }
}
