<?php

namespace Recca0120\Twzipcode\Sources;

class Text extends Source
{
    /**
     * @var string
     */
    private $text;

    /**
     * @param  string  $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    protected function contents()
    {
        return $this->text;
    }
}
