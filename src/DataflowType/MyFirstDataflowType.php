<?php

namespace CodeRhapsodie\DataflowExemple\DataflowType;

use CodeRhapsodie\DataflowBundle\DataflowType\AbstractDataflowType;
use CodeRhapsodie\DataflowBundle\DataflowType\DataflowBuilder;
use CodeRhapsodie\DataflowBundle\DataflowType\Writer\PortWriterAdapter;
use CodeRhapsodie\DataflowExemple\Reader\FileReader;
use CodeRhapsodie\DataflowExemple\Writer\FileWriter;

class MyFirstDataflowType extends AbstractDataflowType
{
    private $myReader;

    private $myWriter;

    public function __construct(FileReader $myReader, FileWriter $myWriter)
    {
        $this->myReader = $myReader;
        $this->myWriter = $myWriter;
    }

    protected function buildDataflow(DataflowBuilder $builder, array $options): void
    {
        $this->myReader->setOptions($options);

        $builder->setReader(new \Port\Reader\IteratorReader($this->myReader))
            ->addStep(function ($data) use ($options) {
                // TODO : Write your code here...
                return $data;
            })
            ->addWriter(new PortWriterAdapter($this->myWriter));
    }

    public function getLabel(): string
    {
        return 'My First Dataflow';
    }

    public function getAliases(): iterable
    {
        return ['mfd'];
    }
}
