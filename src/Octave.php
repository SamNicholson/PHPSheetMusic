<?php

namespace SNicholson\PHPSheetMusic;

class Octave {

    private $octave;

    public function __construct($octave = 0)
    {
        $this->octave = '0';
    }

    public static function lowest()
    {
        return new Octave('lowest');
    }

    public static function lower()
    {
        return new Octave('lower');
    }

    public static function middle()
    {
        return new Octave('middle');
    }

    public static function higher()
    {
        return new Octave('higher');
    }

    public static function highest()
    {
        return new Octave('highest');
    }

    public function __toString(){
        return $this->octave;
    }

}