<?php

namespace Recca0120\Twzipcode\Sources;

class Csv extends Source
{
    /** @var string */
    protected $file;

    /** @var string */
    private $extension;

    public function __construct($file)
    {
        $this->file = $file;
        $this->extension = pathinfo($this->file, PATHINFO_EXTENSION);
    }

    protected function contents()
    {
        return $this->extension === 'zip' ? static::unzip($this->file) : file_get_contents($this->file);
    }
}
