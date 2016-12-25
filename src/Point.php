<?php

namespace Recca0120\Twzipcode;

class Point {
    public $x = 0;

    public $y = 0;

    public function __construct($x = 0, $y = 0) {
        $this->x = $x;
        $this->y = $y;
    }

    public function isEmpty() {
        return $this->x === 0 && $this->y === 0;
    }

    public function compare(Point $point, $operator = '=')
    {
        switch ($operator) {
            case '>':
                return $this->x > $point->x || ($this->x == $point->x && $this->y > $point->y);
                break;
            case '>=':
                return $this->x > $point->x || ($this->x == $point->x && $this->y >= $point->y);
                break;
            case '<':
                return $this->x < $point->x || ($this->x == $point->x && $this->y < $point->y);
                break;
            case '<=':
                return $this->x < $point->x || ($this->x == $point->x && $this->y <= $point->y);
                break;
        }

        return $this->x == $point->x && $this->y == $point->y;
    }
}
