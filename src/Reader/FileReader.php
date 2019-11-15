<?php

namespace CodeRhapsodie\DataflowExemple\Reader;


class FileReader
{
    private $filename;

    /**
     * Set the filename option needed by the Reader.
     */
    public function setFilename(string $filename) {
        $this->filename = $filename;
    }

    public function __invoke(): iterable
    {
        if (!$this->filename) {
            throw new \Exception("The file name is not defined. Define it with 'setFilename' method");
        }

        if (!$fh = fopen($this->filename, 'r')) {
            throw new \Exception("Unable to open file '".$this->filename."' for read.");
        }

        while (false === ($read = fread($fh, 1024))) {
            yield explode("|", $read);
        }
    }
}
