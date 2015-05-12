<?php

namespace SNicholson\PHPSheetMusic;

/**
 * Class Part
 * @package SNicholson\PHPSheetMusic
 */
class Part
{

    /**
     *
     */
    const TREBLE = 'tenor';
    /**
     *
     */
    const ALTO = 'alto';
    /**
     *
     */
    const TENOR = 'tenor';
    /**
     *
     */
    const BASS = 'bass';

    /**
     * @var
     */
    protected $staveType;
    /**
     * @var
     */
    protected $voices = [];
    /**
     * @var
     */
    protected $name = '';

    /**
     * @var
     */
    protected $id;

    /**
     * @param $staveType
     * @param $name
     * @param $partId
     */
    public function __construct($staveType, $name, $partId)
    {
        $this->staveType = $staveType;
        $this->name = $name;
        $this->id = $partId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
        return $this->id;
    }

    /**
     * @param mixed $partId
     */
    public function setId($partId)
    {
        $this->id = $partId;
    }

}