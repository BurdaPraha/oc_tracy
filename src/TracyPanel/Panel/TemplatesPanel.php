<?php

namespace TracyPanel;

use Tracy\IBarPanel;

class TemplatesPanel implements IBarPanel
{
    /** @var string */
    private $title = "Templates";

    /** @var string */
    private $icon = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADWSURBVDjLlZNNCsIwEEZzKW/jyoVbD+Aip/AGgmvRldCKNxDBv4LSfSG7kBZix37BQGiapA48ZpjMvIZAGRExwDmnESw7MMvsHnMFTdOQUsqjrmtXsggKEEVReCDseZc/HbOgoCxLDytwUEFBVVUe/fjNDguEEFGSAiml4Xq+DdZJAV78sM1oOpnT/fI0oEYPZ0lBtjuaBWSttcHtRQWvx9sMrlcb7+HQwxlmojfI9ycziGyj34sK3AV8zd7KFSYFCCwO1aMFsQgK8DO1bRsFM0HBP9i9L2ONMKHNZV7xAAAAAElFTkSuQmCC";

    /**
     * @return array
     */
    private function getLog()
    {
        return isset($_SESSION['_tracy']['templates_log']) ? $_SESSION['_tracy']['templates_log'] : array();
    }

    /**
     * Renders HTML code for custom tab.
     * @return string
     */
    public function getTab()
    {
        return "<span title=''><img src='{$this->icon}'> {$this->title} (" . sizeof($this->getLog()) . ")</span>";
    }

    /**
     * Renders HTML code for custom panel.
     * @return string
     */
    public function getPanel()
    {
        $output = "<h1>{$this->title}</h1>
        <div class='tracy-inner tracy-InfoPanel'>
            <table>
            <thead>
                <tr>
                    <th>template name</th>
                </tr>
            </thead>
            <tbody>";

        $total = sizeof($this->getLog());
        foreach ($this->getLog() as $key => $tpl)
        {
            $output.="
            <tr>
                <td style='font-weight: normal'>{$tpl}</td>
            </tr>";
        }

        $output.="
        </tbody>
        <tfoot>
            <tr>
                <td colspan='2'><strong>Total: {$total} files</strong></td>
            </tr>
        </tfoot>
        </table>
        </div>";

        return $output;
    }
}
