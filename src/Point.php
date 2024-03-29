<?php

namespace Recca0120\Twzipcode;

class Point
{
    /**
     * $x.
     *
     * @var int
     */
    public $x = 0;

    /**
     * $y.
     *
     * @var int
     */
    public $y = 0;

    /**
     * __construct.
     *
     * @param  int  $x
     * @param  int  $y
     */
    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->x === 0 && $this->y === 0;
    }

    /**
     * compare.
     *
     * @param  string  $operator
     * @return bool
     */
    public function compare(self $point, $operator = '=')
    {
        $sum = $this->x * 10 + $this->y;
        $sum2 = $point->x * 10 + $point->y;
        switch ($operator) {
            case '>':
                return $sum > $sum2;
            case '>=':
                return $sum >= $sum2;
            case '<':
                return $sum < $sum2;
            case '<=':
                return $sum <= $sum2;
        }

        return $sum === $sum2;
    }
}
