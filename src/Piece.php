<?php

namespace SNicholson\PHPSheetMusic;

/**
 * Class Piece
 * @package SNicholson\PHPSheetMusic
 */
class Piece
{

    /**
     * @var
     */
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