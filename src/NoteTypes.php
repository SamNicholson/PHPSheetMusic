<?php

namespace SNicholson\PHPSheetMusic;

use ReflectionClass;

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 12/06/2015
 * Time: 01:15
 */
class NoteTypes
{
    /**
     * Breve Constant
     */
    const BREVE = 8;
    /**
     * Semi Breve constant
     */
    const WHOLE = 4;
    /**
     * Minim Constant
     */
    const MINIM = 2;
    /**
     * Crotchet Constant
     */
    const CROTCHET = 1;
    /**
     * Quaver Constant
     */
    const QUAVER = '0.5';
    /**
     * Semi Quaver constant
     */
    const SEMIQUAVER = '0.25';
    /**
     * Demi Semi Quaver Constant
     */
    const DEMI_SEMIQUAVER = '0.125';
    /**
     * Hemi Demi Semi Quaver Constant
     */
    const HEMI_DEMI_SEMIQUAVER = '0.0625';

    /**
     * @return array
     */
    public static function getNotesByLength()
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

    /**
     * @return array
     */
    public static function getNotesByName()
    {
        $oClass = new ReflectionClass(__CLASS__);
        return array_flip($oClass->getConstants());
    }
}
