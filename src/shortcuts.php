<?php

use Tracy\Debugger;
use Tracy\Dumper;

if (!function_exists('__barDump')) {
    /**
     * @param $variable
     * @param string $title
     */
    function __barDump($variable, $title = 'dumps')
    {
        Debugger::barDump($variable, $title, [
            Dumper::COLLAPSE       => 0,
            Dumper::COLLAPSE_COUNT => 0,
            Dumper::DEPTH          => 99,
        ]);
    }
}