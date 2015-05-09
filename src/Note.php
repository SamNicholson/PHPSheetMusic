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

    const BREVE = 'breve';
    const SEMIBREVE = 'semibreve';
    const MINIM = 'minim';
    const CROTCHET = 'crotchet';
    const QUAVER = 'quaver';
    const SEMIQUAVER = 'semiquaver';
    const DEMI_SEMIQUAVER = 'demisemiquaver';
    const HEMI_DEMI_SEMIQUAVER = 'hemidemisemiquaver';

    const A = 'A';
    const Ab = 'Ab';
    const Ash = 'Ab';
    const B = 'B';
    const Bb = 'Bb';
    const Bsh = 'Bb';
    const C = 'C';
    const Cb = 'Cb';
    const Csh = 'Cb';
    const D = 'D';
    const Db = 'Db';
    const Dsh = 'Db';
    const E = 'E';
    const Eb = 'Eb';
    const Esh = 'Eb';
    const F = 'F';
    const Fb = 'Fb';
    const Fsh = 'Fb';
    const G = 'G';
    const Gb = 'Gb';
    const Gsh = 'Gb';

    const STACCATO = 'staccato';
    const DOTTED = 'dotted';
    const LEGATO = 'legato';
    const TENUTO = 'tenuto';

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