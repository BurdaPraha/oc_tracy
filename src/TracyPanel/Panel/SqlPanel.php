<?php

namespace TracyPanel;

use Tracy\IBarPanel;

class SqlPanel implements IBarPanel
{
    /** @var string */
    private $title = "SQL Log";

    /** @var string */
    private $icon = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAFo9M/3AAAACXBIWXMAAAsSAAALEgHS3X78AAACwklEQVR4nF1TO0hbYRQ+9/rn4TMkqVbQgArSoUQIuHRRKXRoB42QpXUpdKkuVjq4WDq5OQgSsnVokSxtCIRKSRRKiohkChmqqSAWKRLzMmqCSbzp+U4TkB74uf+95/Wd73xXNRoNumVTxLa1taWrUCj0tV6v11StVnvGHlKI2dvba2iaRrgrvugbGxvkdrspmUySYjMVi8WSYRgNm83WpaLRaDWVSqEobW9v36pEIkGDg4Ok6zqdnJyQstvtUgyHU/51KRQKjUqlQlxHDjoio6OjgwSh3++nsbExGhoaEgeSDg8P6eDgQFCo9fV1yuVylM/nqb+/nzKZDPE01NPTQ4ovdc6yzc7Ohqenpx+1t7ebuUU1HA7/iEQiXsHg8/mer7ENDAzcx/vp6emfxcXFNxwQUsvLy2vc4i2AnZ2dyXwWi8UVCAS+LCwsvFNWq/Uh5mtra6O7hmm6u7vdwGDEYjGam5ujcrksTsZBwWAQ0xjq+vpaGxkZoaOjI2JOZUSQhcPTaOrq6sqCjGq1Kk6Uvrm5EZLYZ1XpdPrX+Pj4487OTglCAO7ggslKq3g8/np4eDjJU77n9veAgQnLrK6urjD4D6rZ08l0f2KynppMJqkCw+iw1vJgWAXLhTY3Nz8vLS29kl0xJ0GPx/MEg7QCW8l37a5vYmLCx8rSpADDNKAGl8tFzKsEotP/1lIKYsH9/v6+oZo+DbB2d3clwOv10vHxsSzH6XTS+fm53HnVxLIns9lMfX19KKhDTPr8/LwJ6sGient7RahQEjoCCdYAZPiO++XlpaiNiyrF/46VjxkfWiqHcWFZC5ChCBAAHQqXSiUpwHkWbKHM4noxMzPzcXR0dJL1I0kIaHaRdxTEO/z4trOz841/5ZfCASvjNz+mmgx38VqnePeT/DM+cDgcXdlstsQS/8m8fL+4uIhz00qL2L+q8JY4lxJrkwAAAABJRU5ErkJggg==";

    /**
     * @return array
     */
    private function getLog()
    {
        return isset($_SESSION['_tracy']['sql_log']) ? $_SESSION['_tracy']['sql_log'] : array();
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
                    <th>ms</th>
                    <th>sql</th>
                    <th>file</th>
                    <th>url</th>

                </tr>
            </thead>
            <tbody>";

        $total_time = 0;
        foreach ($this->getLog() as $key => $sql)
        {
            $output.="
            <tr>
                <td".($sql['time'] > 1 ? ' style="background-color:red;color:white;"' : '').">{$sql['time']}</td>
                <td style='font-weight: normal'>{$sql['query']}</td>
                <td style='font-weight: normal'>{$sql['file']}</td>
                <td style='font-weight: normal'>{$sql['page_url']}</td>

            </tr>";
            $total_time += $sql['query_total_time'];
        }

        $output.="
        </tbody>
        <tfoot>
            <tr>
                <td colspan='2'><strong>Total: {$total_time} ms</strong></td>
            </tr>
        </tfoot>
        </table>
        </div>";

        return $output;
    }
}
