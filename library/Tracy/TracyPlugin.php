<?php

namespace TracyPanel;

use Tracy\Debugger;
use Tracy\Dumper;

class TracyPlugin
{
    private $eventLog;

    public function __construct()
    {
        Debugger::getBar()
            ->addPanel(new \TracyPanel\SystemPanel())
            ->addPanel(new \TracyPanel\SqlPanel())
            ->addPanel(new \TracyPanel\VariablePanel())
        ;
    }

    /**
     * Log extend event
     *
     * @param string $event
     * @param array  $args
     */
    public function log($event, $args)
    {
        if (isset($this->eventLog->data[$event]))
        {
            ++$this->eventLog->data[$event][0];
        }
        else
        {
            $argsInfo = [];
            foreach ($args as $argName => $argValue)
            {
                $argsInfo[$argName] = gettype($argValue);
            }
            $this->eventLog->data[$event] = [1, $argsInfo];
        }
    }

}

$instance = new TracyPlugin();

function __barDump($variable, $title = 'dumps')
{
    Debugger::barDump($variable, $title, [
        Dumper::COLLAPSE       => 0,
        Dumper::COLLAPSE_COUNT => 0,
        Dumper::DEPTH          => 99,
    ]);

}