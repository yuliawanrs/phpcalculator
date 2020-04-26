<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;

class PowCommand extends Command
{
    /**
     * @var string
     */
    protected $signature;

    /**
     * @var string
     */
    protected $description;

    public function __construct()
    {
        $commandVerb = $this->getCommandVerb();
        $commandFunction = $this->getCommandFunction();

        $this->signature = sprintf(
            '%s {base : The base number} {exp : The exponent number}',
            $commandVerb
        );
        $this->description = sprintf('%s the given number', ucfirst($commandFunction));
        parent::__construct();
    }

    protected function getCommandVerb(): string
    {
        return 'pow';
    }

    protected function getCommandFunction(): string
    {
        return 'exponent';
    }

    public function handle(): void
    {
        $base = $this->getBase();
        $exp = $this->getExp();
        $description = $this->generateCalculationDescription($base, $exp);
        $result = $this->calculate($base, $exp);

        $this->comment(sprintf('%s = %s', $description, $result));
    }

    protected function getBase(): int
    {
        return $this->argument('base');
    }

    protected function getExp(): int
    {
        return $this->argument('exp');
    }

    protected function generateCalculationDescription($base, $exp): string
    {
        $operator = $this->getOperator();

        return sprintf('%s %s %s', $base, $operator, $exp);
    }

    protected function getOperator(): string
    {
        return '^';
    }

    protected function calculate($number1, $number2)
    {
        return pow($number1, $number2);
    }
}