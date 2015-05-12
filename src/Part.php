<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 11/05/2015
 * Time: 20:49
 */

namespace SNicholson\PHPSheetMusic;


class Part {

    const TREBLE = 'tenor';
    const ALTO = 'alto';
    const TENOR = 'tenor';
    const BASS = 'bass';

    protected $staveType;
    protected $voices;

    public function __construct($staveType, $partId)
    {
        $this->staveType = $staveType;
        $this->partId = $partId;
    }

    /**
     * @return mixed
     */
    public function getVoices()
    {
        return $this->voices;
    }

    /**
     * @param mixed $voices
     */
    public function setVoices(Voice ...$voices)
    {
        $this->voices = $voices;
    }

    /**
     * @return mixed
     */
    public function getStaveType()
    {
        return $this->staveType;
    }

    /**
     * @param mixed $staveType
     */
    public function setStaveType($staveType)
    {
        $this->staveType = $staveType;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->partId;
    }
    /**
     * @param mixed $partId
     */
    public function setId($partId)
    {
        $this->partId = $partId;
    }

    protected $partId;

}