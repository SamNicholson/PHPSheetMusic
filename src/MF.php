<?php

namespace SNicholson\PHPSheetMusic;

/**
 * The Primary Static Music Factory
 * Class MF
 * @package SNicholson\PHPSheetMusic
 */
class MF
{

    /**
     * Returns a new instance of a note
     * @param $pitch
     * @param int $length
     * @param null $modifiers
     * @return Note
     */
    static public function note($pitch, $length = Note::CROTCHET, $modifiers = null)
    {
        return new Note($pitch, $length, $modifiers);
    }

    /**
     * Returns a new instance of a rest
     * @param int $length
     * @param array $modifiers
     * @return Rest
     */
    static public function rest($length = Note::CROTCHET, $modifiers = [])
    {
        return new Rest($length, $modifiers);
    }

    /**
     * Returns a new instance of a time signature
     * @param int $beatsPerBar
     * @param int $beatLength
     * @return TimeSignature
     */
    static public function timeSignature($beatsPerBar = 4, $beatLength = 4)
    {
        return new TimeSignature($beatsPerBar, $beatLength);
    }

    /**
     * Returns a new instance of a Key Signature
     * @param $keyName
     * @return keySignature
     */
    static public function keySignature($keyName)
    {
        return new keySignature($keyName);
    }

    /**
     * Returns a new instance of a voice
     * @param TimeSignature $timeSignature
     * @param KeySignature $keySignature
     * @return Voice
     */
    static public function voice(TimeSignature $timeSignature, KeySignature $keySignature)
    {
        return new Voice($timeSignature, $keySignature);
    }

}