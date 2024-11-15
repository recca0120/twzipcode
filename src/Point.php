<?php

namespace Recca0120\Twzipcode;

class Point
{
    /** @var int */
    public $x = 0;

    /** @var int */
    public $y = 0;

    /**
     * @param  int  $x
     * @param  int  $y
     */
    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->x === 0 && $this->y === 0;
    }

    /**
     * @param  string  $operator
     * @return bool
     */
    public function compare(self $point, $operator = '=')
    {
        $x = $this->x * 10 + $this->y;
        $y = $point->x * 10 + $point->y;

        switch ($operator) {
            case '>':
                return $x > $y;
            case '>=':
                return $x >= $y;
            case '<':
                return $x < $y;
            case '<=':
                return $x <= $y;
        }

        return $x === $y;
    }
}
