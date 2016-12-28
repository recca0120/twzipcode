<?php

namespace Recca0120\Twzipcode;

class Point
{
    public $x = 0;

    public $y = 0;

    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function isEmpty()
    {
        return $this->x === 0 && $this->y === 0;
    }

    public function compare(Point $point, $operator = '=')
    {
        $sum = $this->x * 10 + $this->y;
        $sum2 = $point->x * 10 + $point->y;
        switch ($operator) {
            case '>':
                return $sum > $sum2;
                break;
            case '>=':
                return $sum >= $sum2;
                break;
            case '<':
                return $sum < $sum2;
                break;
            case '<=':
                return $sum <= $sum2;
                break;
        }

        return $sum === $sum2;
    }
}
