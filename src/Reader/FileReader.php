<?php

declare(strict_types=1);

namespace CodeRhapsodie\DataflowExemple\Reader;

class FileReader
{
    public function read(string $filename): iterable
    {
        if (!$filename) {
            throw new \Exception("The file name is not defined. Define it with 'setFilename' method");
        }

        if (!$fh = fopen($filename, 'r')) {
            throw new \Exception("Unable to open file '".$filename."' for read.");
        }

        while (false !== ($read = fgets($fh))) {
            yield explode('|', trim($read));
        }
    }
}
