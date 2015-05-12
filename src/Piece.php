<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 12/05/2015
 * Time: 22:49
 */

namespace SNicholson\PHPSheetMusic;


class Piece {

    protected $parts;

    /**
     * @return mixed
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * @param mixed $parts
     */
    public function setParts(Part ...$parts)
    {
        $this->parts = $parts;
    }

}