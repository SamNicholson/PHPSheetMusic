<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 22:15
 */

namespace SNicholson\PHPSheetMusic;


class KeySignature
{

    public static $cSharp = 'cSharpKey';
    private static $cSharpKey = [
        Note::C => Note::SHARP,
        Note::D => Note::SHARP,
        Note::E => Note::SHARP,
        Note::F => Note::SHARP,
        Note::G => Note::SHARP,
        Note::A => Note::SHARP,
        Note::B => Note::SHARP
    ];

    public static $fSharp = 'fSharpKey';
    private static $fSharpKey = [
        Note::C => Note::SHARP,
        Note::D => Note::SHARP,
        Note::E => Note::SHARP,
        Note::F => Note::SHARP,
        Note::G => Note::SHARP,
        Note::A => Note::SHARP,
    ];

    public static $bSharp = 'bSharpKey';
    private static $bSharpKey = [
        Note::C => Note::SHARP,
        Note::D => Note::SHARP,
        Note::F => Note::SHARP,
        Note::G => Note::SHARP,
        Note::A => Note::SHARP,
    ];

    public static $eSharp = 'eSharpKey';
    private static $eSharpKey = [
        Note::C => Note::SHARP,
        Note::D => Note::SHARP,
        Note::F => Note::SHARP,
        Note::G => Note::SHARP,
    ];

    private static $a = [
        Note::C => Note::SHARP,
        Note::F => Note::SHARP,
        Note::G => Note::SHARP,
    ];


    public static $d = 'dKey';
    private static $dKey = [
        Note::C => Note::SHARP,
        Note::F => Note::SHARP,
    ];

    public static $g = 'gKey';
    private static $gKey = [
        Note::F => Note::SHARP,
    ];

    public static $c = 'cKey';
    private static $cKey = [
        Note::F => Note::SHARP,
    ];

    public static $f = 'fKey';
    private static $fKey = [
        Note::B => Note::FLAT,
    ];

    public static $bFlat = 'bFlatKey';
    private static $bFlatKey = [
        Note::B => Note::FLAT,
        Note::E => Note::FLAT,
    ];

    public static $eFlat = 'eFlatKey';
    private static $eFlatKey = [
        Note::B => Note::FLAT,
        Note::E => Note::FLAT,
        Note::A => Note::FLAT,
    ];

    public static $aFlat = 'aFlatKey';
    private static $aFlatKey = [
        Note::B => Note::FLAT,
        Note::E => Note::FLAT,
        Note::A => Note::FLAT,
        Note::D => Note::FLAT,
    ];

    public static $dFlat = 'dFlatKey';
    private static $dFlatKey = [
        Note::B => Note::FLAT,
        Note::E => Note::FLAT,
        Note::A => Note::FLAT,
        Note::D => Note::FLAT,
        Note::G => Note::FLAT,
    ];

    public static $gFlat = 'gFlatKey';
    private static $gFlatKey = [
        Note::B => Note::FLAT,
        Note::E => Note::FLAT,
        Note::A => Note::FLAT,
        Note::D => Note::FLAT,
        Note::G => Note::FLAT,
        Note::C => Note::FLAT,
    ];

    public static $cFlat = 'cFlatKey';
    private static $cFlatKey = [
        Note::B => Note::FLAT,
        Note::E => Note::FLAT,
        Note::A => Note::FLAT,
        Note::D => Note::FLAT,
        Note::G => Note::FLAT,
        Note::C => Note::FLAT,
        Note::F => Note::FLAT,
    ];

    private $keyName;

    public function __construct($keyName)
    {
        $this->keyName = $keyName;
    }

    /**
     * @return mixed
     */
    public function getKeyName()
    {
        return $this->keyName;
    }

    public function getNoteDecimalPitch(Note $note)
    {
        $key = $this->keyName;
        $keyVar = self::$$key;
        $pitch = $note->getPitch();
        if(!empty($keyVar[$note->getNoteName()])) {
            $pitchChange = $keyVar[$note->getNoteName()];
            if($pitchChange == Note::SHARP) {
                $pitch += 0.5;
            } else if($pitchChange == Note::FLAT) {
                $pitch -= 0.5;
            }
        }
        return $pitch;
    }


}