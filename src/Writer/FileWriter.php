<?php
namespace CodeRhapsodie\DataflowExemple\Writer;

use CodeRhapsodie\DataflowBundle\DataflowType\Writer\WriterInterface;

class FileWriter implements WriterInterface
{
    private $fh;

    public function prepare()
    {

        if (!$this->fh = fopen('/path/to/file', 'w')) {
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
