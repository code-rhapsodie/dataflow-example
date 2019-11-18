<?php
namespace CodeRhapsodie\DataflowExemple\Writer;

use CodeRhapsodie\DataflowBundle\DataflowType\Writer\WriterInterface;

class FileWriter implements WriterInterface
{
    private $fh;

    /** @var string */
    private $path;

    public function setDestinationFilePath(string $path) {
        $this->path = $path;
    }

    public function prepare()
    {
        if (!$this->fh = fopen($this->path, 'w')) {
            throw new \Exception("Unable to open in write mode the output file.");
        }
    }

    public function write($item)
    {
        fputcsv($this->fh, $item);
    }

    public function finish()
    {
        fclose($this->fh);
    }
}
