<?php

declare(strict_types=1);

namespace CodeRhapsodie\DataflowExemple\DataflowType;

use CodeRhapsodie\DataflowBundle\DataflowType\AbstractDataflowType;
use CodeRhapsodie\DataflowBundle\DataflowType\DataflowBuilder;
use CodeRhapsodie\DataflowExemple\Reader\FileReader;
use CodeRhapsodie\DataflowExemple\Writer\FileWriter;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
        $this->myWriter->setDestinationFilePath($options['to-file']);

        $builder->setReader($this->myReader->read($options['from-file']))
            ->addStep(function ($data) use ($options) {
                // TODO : Write your code here...
                return $data;
            })
            ->addWriter($this->myWriter);
    }

    protected function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver->setDefaults(['to-file' => '/tmp/dataflow.csv', 'from-file' => null]);
        $optionsResolver->setRequired('from-file');
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
