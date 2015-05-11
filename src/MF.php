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
     * @param $pitch
     * @param null $modifiers
     */
    static public function breve($pitch, $modifiers = null)
    {
        self::note($pitch, Note::BREVE, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    static public function breveRest($modifiers = null)
    {
        return self::rest(Note::BREVE, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $modifiers
     * @return Note
     */
    static public function semiBreve($pitch, $modifiers = null)
    {
        return self::note($pitch, Note::SEMIBREVE, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    static public function semiBreveRest($modifiers = null)
    {
        return self::rest(Note::SEMIBREVE, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $modifiers
     * @return Note
     */
    static public function minim($pitch, $modifiers = null)
    {
        return self::note($pitch, Note::MINIM, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    static public function minimRest($modifiers = null)
    {
        return self::rest(Note::MINIM, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $modifiers
     * @return Note
     */
    static public function crotchet($pitch, $modifiers = null)
    {
        return self::note($pitch, Note::CROTCHET, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    static public function crotchetRest($modifiers = null)
    {
        return self::rest(Note::CROTCHET, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $modifiers
     * @return Note
     */
    static public function quaver($pitch, $modifiers = null)
    {
        return self::note($pitch, Note::QUAVER, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    static public function quaverRest($modifiers = null)
    {
        return self::rest(Note::QUAVER, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $modifiers
     * @return Note
     */
    static public function semiQuaver($pitch, $modifiers = null)
    {
        return self::note($pitch, Note::SEMIQUAVER, $modifiers);
    }

    /**
     * @param null $modifiers
     */
    static public function semiQuaverRest($modifiers = null)
    {
        self::rest(Note::SEMIQUAVER, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    static public function demiSemiQuaver($modifiers = null)
    {
        return self::rest(Note::DEMI_SEMIQUAVER, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    static public function demiSemiQuaverRest($modifiers = null)
    {
        return self::rest(Note::DEMI_SEMIQUAVER, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    static public function hemiDemiSemiQuaver($modifiers = null)
    {
        return self::rest(Note::HEMI_DEMI_SEMIQUAVER, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    static public function hemiDemiSemiQuaverRest($modifiers = null)
    {
        return self::rest(Note::HEMI_DEMI_SEMIQUAVER, $modifiers);
    }

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