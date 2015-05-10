<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 17:11
 */

namespace SNicholson\PHPSheetMusic;

/**
 * Class Note
 * @package SNicholson\PHPSheetMusic
 */
class Note
{

    /**
     *
     */
    const BREVE = 8;
    /**
     *
     */
    const SEMIBREVE = 4;
    /**
     *
     */
    const MINIM = 2;
    /**
     *
     */
    const CROTCHET = 1;
    /**
     *
     */
    const QUAVER = 0.5;
    /**
     *
     */
    const SEMIQUAVER = 0.25;
    /**
     *
     */
    const DEMI_SEMIQUAVER = 0.125;
    /**
     *
     */
    const HEMI_DEMI_SEMIQUAVER = 0.0625;

    /**
     *
     */
    const A = 'A';
    /**
     *
     */
    const B = 'B';
    /**
     *
     */
    const C = 'C';
    /**
     *
     */
    const D = 'D';
    /**
     *
     */
    const E = 'E';
    /**
     *
     */
    const F = 'F';
    /**
     *
     */
    const G = 'G';

    /**
     *
     */
    const STACCATO = 'staccato';
    /**
     *
     */
    const DOTTED = 'dotted';
    /**
     *
     */
    const LEGATO = 'legato';
    /**
     *
     */
    const TENUTO = 'tenuto';
    /**
     *
     */
    const FLAT = 'flat';
    /**
     *
     */
    const SHARP = 'sharp';

    /**
     * @var
     */
    protected $length;
    /**
     * @var
     */
    protected $noteName;
    /**
     * @var
     */
    protected $pitch;
    /**
     * @var array
     */
    protected $modifiers = [];

    /**
     * @var array
     */
    private $pitchMap = [
        'A' => -1.5,
        'B' => -0.5,
        'C' => 0,
        'D' => 1,
        'E' => 2,
        'F' => 2.5,
        'G' => 3.5,
    ];

    /**
     * @param $pitch
     * @param int $length
     * @param null $modifiers
     */
    public function __construct($pitch, $length = Note::CROTCHET, $modifiers = null)
    {
        $this->length = $length;
        $this->noteName = $pitch;
        $this->pitch = $this->pitchMap[$pitch];
        if (!empty($modifiers) && is_string($modifiers)) {
            $this->modifiers[] = $modifiers;
        } else if (!empty($modifiers) && is_array($modifiers)) {
            $this->modifiers = $modifiers;
        }
        $this->handlePitchModifiers();
    }

    /**
     *
     */
    private function handlePitchModifiers()
    {
        if (in_array(Note::FLAT, $this->modifiers)) {
            $this->pitch -= 0.5;
        } else if (in_array(Note::SHARP, $this->modifiers)) {
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

    /**
     * @return mixed
     */
    public function getNoteName()
    {
        return $this->noteName;
    }


}