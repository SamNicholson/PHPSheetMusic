<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 09/05/2015
 * Time: 19:23
 */

namespace SNicholson\PHPSheetMusic;
use SNicholson\PHPSheetMusic\Interfaces\MusicalItem;


/**
 * Class Rest
 * @package SNicholson\PHPSheetMusic
 */
class Rest implements MusicalItem
{

    /**
     * @var
     */
    protected $length;
    /**
     * @var array
     */
    protected $modifiers;

    /**
     * @param $length
     * @param Array $modifiers
     */
    public function __construct($length = Note::CROTCHET, $modifiers = [])
    {
        $this->length = $length;
        if (!empty($modifiers) && is_string($modifiers)) {
            $this->modifiers[] = $modifiers;
        } else if (!empty($modifiers) && is_array($modifiers)) {
            $this->modifiers = $modifiers;
        }
    }

    /**
     * Returns an array of any modifiers that have been set, will return an empty array if none
     * @return array
     */
    public function getModifiers()
    {
        return $this->modifiers;
    }

    /**
     * Returns the length, default of which is a crotchet
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

}