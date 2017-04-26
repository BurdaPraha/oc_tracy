<?php

namespace TracyPanel;

use Tracy\Dumper;
use Tracy\IBarPanel;

class VariablePanel implements IBarPanel
{
    private $title = "Variables";
    private $icon = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAFo9M/3AAAACXBIWXMAAAsSAAALEgHS3X78AAADdElEQVR4nG1TbUyTVxR+3va2tG8/iB3VFNwoYaIyNgSNog42oRhGdIQZEbOhmbh1Xz/cjJAtqOk2F4eoRFETXByBLGtgzLEfYjLMRo04JStzRgZ1oxkIk6KUfkL7vuV6W4WEZSe5ueee89znnvOcXEIpReNoKEh6zM92171wUEmikagRWNbRt99Zg1gkLmfP7pRjF5ruVpZXkWg6lNzZpK2J/5L7TFEbQ2jSTDkhr3c2fP/mzRjC39F1/SVVjIsjOL2J0okpmN9djULXOCWOrtve8JSoanx+RMrewvy7atMHby072dDIs2OYJf4w5RWHxmydMc6ufbnfuc8d2ibvBzQ84AsCr1qL2lmKJ1fKltpMaepctB8FJfUo0t+BLdOHXneC8rWx25QUtN7Li7IkyaXbR8ORtsvMlxsVhZPrYblotRbM1xC1rXWX2helGNObt6WvnIuROSdjFJQ3FeMBB6R3+Kf7S9TKBQCHhxUoAqlaYCJVrZhnyDPIs20/nOh9z5mPs0+lo/chsHjYA80p40e+RvcJYqsr+A0/taA+eB5reDO+2XwHydkUktJdx7X79csJHMNMUSm7lorXhxpQoXEiwZ6INGMK+I2qErKuwVF2Y4uuFe4R7LkevMi/uGSLQGZlPb/3gQxEKLnxUGjTyaTZbnF2gLU8/TUrzHAw7S/feU+NcF+0LtAhVrV++TMrzEePbNpVssOQJJGJYUAiB+zXXJOXzbvfDDo7f1yAx39M/tzLhQ5z6Rv3fMB0NxtsCNCy+WU9vViXf62zg2RW1Ii3Wo78L0H5Mj6/avsney1DgCcOUOhY7wzhiwA9jFBgEkIhaBdU0Lx1Sf3O8s2VspQstfWrzxlqBof9n6LWnokvdK/Ar5KDuLzYsMiOwpwhJP1aVGUOvV9lrW475j018TFJildkENegCq4BYNQFTHrBJa9AdYYH1ePfolj7M66WhTEwpEefU4BkmINcQbBq/6oD3lLPXvK9/cHVlSSSk6jmVJDIAKUeGB4DRlrZ55jFTC4P/58h+EP/IlFpgJT9Eogcbv0zCN/dKYGc6Q9YWCuWVBUxNa2NbzbSiKF+MPjLhXHh5BTFJWqloiJLUxFXmXAmoOE0gbCXEQtMlEA3vRKsnRfx74DYxbbEqH/8yZqzmT5fC9taJCpuIw1ijI3eiQ8f5x4BPflpin6SVScAAAAASUVORK5CYII=";

    /**
     * Renders HTML code for custom tab.
     * @return string
     */
    public function getTab()
    {
        return "<span title=''><img src='{$this->icon}'> {$this->title}</span>";
    }

    /**
     * Renders HTML code for custom panel.
     * @return string
     */
    public function getPanel()
    {
        $output = "<h1>{$this->title}</h1>
        <div class='tracy-inner tracy-InfoPanel'>";
        foreach (['_GET', '_POST', '_COOKIE', '_SESSION'] as $globalVarName)
        {
            if (!empty($GLOBALS[$globalVarName]))
            {
                $output.="$" . $globalVarName . " (" . sizeof($GLOBALS[$globalVarName]) . ")";
                $output.="<table><tbody>";
                $output.=Dumper::toHtml($GLOBALS[$globalVarName]);
                $output.="</tbody></table><br>";
            }
        }
        $output.="</div>";
        return $output;
    }
}
