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
     * Quick generation of Breve
     * @param $pitch
     * @param null $octave
     * @param null $modifiers
     */
    public static function breve($pitch, $octave = null, $modifiers = null)
    {
        self::note($pitch, Note::BREVE, $octave = null, $modifiers);
    }

    /**
     * Quick Generation of Breve Rest
     * @param null $modifiers
     * @return Rest
     */
    public static function breveRest($modifiers = null)
    {
        return self::rest(Note::BREVE, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $octave
     * @param null $modifiers
     * @return Note
     */
    public static function semiBreve($pitch, $octave = null, $modifiers = null)
    {
        return self::note($pitch, Note::SEMIBREVE, $octave = null, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    public static function semiBreveRest($modifiers = null)
    {
        return self::rest(Note::SEMIBREVE, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $octave
     * @param null $modifiers
     * @return Note
     */
    public static function minim($pitch, $octave = null, $modifiers = null)
    {
        return self::note($pitch, Note::MINIM, $octave, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    public static function minimRest($modifiers = null)
    {
        return self::rest(Note::MINIM, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $octave
     * @param null $modifiers
     * @return Note
     */
    public static function crotchet($pitch, $octave = null, $modifiers = null)
    {
        return self::note($pitch, Note::CROTCHET, $octave, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    public static function crotchetRest($modifiers = null)
    {
        return self::rest(Note::CROTCHET, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $octave
     * @param null $modifiers
     * @return Note
     */
    public static function quaver($pitch, $octave = null, $modifiers = null)
    {
        return self::note($pitch, Note::QUAVER, $octave, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    public static function quaverRest($modifiers = null)
    {
        return self::rest(Note::QUAVER, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $octave
     * @param null $modifiers
     * @return Note
     */
    public static function semiQuaver($pitch, $octave = null, $modifiers = null)
    {
        return self::note($pitch, Note::SEMIQUAVER, $octave, $modifiers);
    }

    /**
     * @param null $modifiers
     */
    public static function semiQuaverRest($modifiers = null)
    {
        self::rest(Note::SEMIQUAVER, $modifiers);
    }

    /**
     * @param $pitch
     * @param null $octave
     * @param null $modifiers
     * @return Rest
     */
    public static function demiSemiQuaver($pitch, $octave = null, $modifiers = null)
    {
        return self::note($pitch, Note::DEMI_SEMIQUAVER, $octave, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    public static function demiSemiQuaverRest($modifiers = null)
    {
        return self::rest(Note::DEMI_SEMIQUAVER, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    public static function hemiDemiSemiQuaver($modifiers = null)
    {
        return self::rest(Note::HEMI_DEMI_SEMIQUAVER, $modifiers);
    }

    /**
     * @param null $modifiers
     * @return Rest
     */
    public static function hemiDemiSemiQuaverRest($modifiers = null)
    {
        return self::rest(Note::HEMI_DEMI_SEMIQUAVER, $modifiers);
    }

    /**
     * Returns a new instance of a note
     * @param $pitch
     * @param int $length
     * @param null $octave
     * @param null $modifiers
     * @return Note
     */
    public static function note($pitch, $length = Note::CROTCHET, $octave = null, $modifiers = null)
    {
        if ($octave === null) {
            $octave = Octave::middle();
        }
        $note = new Note($pitch, $length, $modifiers);
        $note->setOctave($octave);
        return $note;
    }

    /**
     * Returns a new instance of a rest
     * @param int $length
     * @param array $modifiers
     * @return Rest
     */
    public static function rest($length = Note::CROTCHET, $modifiers = [])
    {
        return new Rest($length, $modifiers);
    }

    /**
     * Returns a new instance of a time signature
     * @param int $beatsPerBar
     * @param int $beatLength
     * @return TimeSignature
     */
    public static function timeSignature($beatsPerBar = 4, $beatLength = 4)
    {
        return new TimeSignature($beatsPerBar, $beatLength);
    }

    /**
     * Returns a new instance of a Key Signature
     * @param $keyName
     * @return keySignature
     */
    public static function keySignature($keyName)
    {
        return new keySignature($keyName);
    }

    /**
     * Returns a new instance of a voice
     * @param TimeSignature $timeSignature
     * @param KeySignature $keySignature
     * @return Voice
     */
    public static function voice(TimeSignature $timeSignature, KeySignature $keySignature)
    {
        return new Voice($timeSignature, $keySignature);
    }

}