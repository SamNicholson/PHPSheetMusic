<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 17:11
 */

namespace SNicholson\PHPSheetMusic;

class Note
{

    const BREVE = 8;
    const SEMIBREVE = 4;
    const MINIM = 2;
    const CROTCHET = 1;
    const QUAVER = 0.5;
    const SEMIQUAVER = 0.25;
    const DEMI_SEMIQUAVER = 0.125;
    const HEMI_DEMI_SEMIQUAVER = 0.0625;

    const A = -1.5;
    const B = -0.5;
    const C = 0;
    const D = 1;
    const E = 2;
    const F = 2.5;
    const G = 3.5;

    const STACCATO = 'staccato';
    const DOTTED = 'dotted';
    const LEGATO = 'legato';
    const TENUTO = 'tenuto';
    const FLAT = 'flat';
    const SHARP = 'sharp';

    protected $length;
    protected $pitch;
    protected $modifiers = [];

    public function __construct($pitch, $length = Note::CROTCHET, $modifiers = null)
    {
        $this->length = $length;
        $this->pitch = $pitch;
        if (!empty($modifiers) && is_string($modifiers)) {
            $this->modifiers[] = $modifiers;
        } else if (!empty($modifiers) && is_array($modifiers)) {
            $this->modifiers = $modifiers;
        }
        $this->handlePitchModifiers();
    }

    private function handlePitchModifiers()
    {
        if(in_array(Note::FLAT,$this->modifiers)) {
            $this->pitch -= 0.5;
        } else if(in_array(Note::SHARP,$this->modifiers)) {
            $this->pitch += 0.5;
        }
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return mixed
     */
    public function getPitch()
    {
        return $this->pitch;
    }

    /**
     * @return mixed
     */
    public function getModifiers()
    {
        return $this->modifiers;
    }


}