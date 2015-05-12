<?php

namespace SNicholson\PHPSheetMusic;

use SNicholson\PHPSheetMusic\Interfaces\MusicalItem;

/**
 * Class Note
 * @package SNicholson\PHPSheetMusic
 */
class Note implements MusicalItem
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
     *
     */
    const NATURAL = 'natural';

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
     * @var Octave
     */
    protected $octave;

    /**
     * @return Octave
     */
    public function getOctave()
    {
        return $this->octave;
    }

    /**
     * @param Octave $octave
     */
    public function setOctave(Octave $octave)
    {
        $this->octave = $octave;
    }

    /**
     * @return array
     */
    public function getPitchMap()
    {
        return $this->pitchMap;
    }

    /**
     * @param array $pitchMap
     */
    public function setPitchMap($pitchMap)
    {
        $this->pitchMap = $pitchMap;
    }

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
        $this->octave = Octave::middle();
        $this->length = $length;
        $this->noteName = $pitch;
        $this->pitch = $this->pitchMap[$pitch];
        if (!empty($modifiers) && is_string($modifiers)) {
            $this->modifiers[] = $modifiers;
        } elseif (!empty($modifiers) && is_array($modifiers)) {
            $this->modifiers = $modifiers;
        }
        $this->handlePitchModifiers();
        $this->handleLengthModifiers();
        return $this;
    }

    /**
     * Handles pitch modifiers which are applied to the note
     */
    private function handlePitchModifiers()
    {
        if (in_array(Note::FLAT, $this->modifiers)) {
            $this->pitch -= 0.5;
        } elseif (in_array(Note::SHARP, $this->modifiers)) {
            $this->pitch += 0.5;
        }
    }

    /**
     * Handles length modifiers which are applied to the note
     */
    private function handleLengthModifiers()
    {
        if (in_array(Note::DOTTED, $this->modifiers)) {
            $this->length = $this->length * 1.5;
        }
    }

    /**
     * Returns the lengoth of the note in decimals
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Returns the integer pitch of the note
     * @return mixed
     */
    public function getPitch()
    {
        return $this->pitch;
    }

    /**
     * Returns the modifiers that have been applied to this note
     * @return mixed
     */
    public function getModifiers()
    {
        return $this->modifiers;
    }

    /**
     * Returns the text name of the note e.g. A, B, C etc.
     * @return mixed
     */
    public function getNoteName()
    {
        return $this->noteName;
    }


}