<?php

namespace TracyPanel;

use Tracy\Debugger;
use Tracy\Dumper;
use TracyPanel;

class Plugin
{
    private $eventLog;

    public function __construct()
    {
        Debugger::getBar()
            ->addPanel(new SystemPanel())
            ->addPanel(new SqlPanel())
            ->addPanel(new TemplatesPanel())
            ->addPanel(new VariablePanel());
    }

    /**
     * Log extend event, todo: use it for some hooks(?)
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