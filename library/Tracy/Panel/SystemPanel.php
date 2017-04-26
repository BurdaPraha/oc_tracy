<?php

namespace TracyPanel;

use Tracy\IBarPanel;

class SystemPanel implements IBarPanel
{
    /** @var string */
    private $title = "System";

    /** @var string */
    private $icon = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAFo9M/3AAAACXBIWXMAAAsSAAALEgHS3X78AAADo0lEQVR4nD2Sf0xVZRjHv+ec9/y8P+AeuPdCXECJSLveZNeYkP2YJWo5YlpNGM7EybCsnND4w1wLcxWb1cg/rNa0RQppqa3ojxo2J60hQSngjzKqC11W2M174XIu995zTu+5TJ/t3bs9e97v83w/z0tM08TKpoE4KQzUNk2MfKEQV96S4OzNv8PE+Uj3ULA8D8SqqWi+ZHq9MiKaCQIaUV3A57sXo/0CWahY1dj7q6bNzgz3bA6Syl3XTIe7BHqaxYN7QyaZjsQxnRCRW2CD5LKB3Pihrf7N9z7t/istorPRvyyjsaRqe5s9sKcjmdZx/lAAq1svQ5RkjHRvfICUrKh7UV2xt0OHiVmqm2XjkOBFEJmFf8fX/WR8qOfdwrqxTlHSQWyCNSU8xdlQcyRIorAw90SPn+FlNX/RY28fr2yJlpnRkcEzR3fWG0Zay8xgRfnj+z9UfGuepsn01MVPOv8c/GC/lc8oPLrnmsn7alG33oOBq3GY8u72+5oHWn58f2U2CdZ0HOfy18NkWXwzPIPYvAlWJOAkNSt3ac12It2xemOKZTCjGXi1xovvLsdx7ooGjmNRUNncSnTDMMKRFBSHAJNhIMo8HCrtzXPg5jidhH4++ZFQuuU5K8FQJULlHS4CgRaOHT34GpkafGtXacPwjrQB4Z5CEUuLZVzqTUCcD/0RHu07mXFx/VhQdC9/pm3TK9uetTvYZOjswQOh4S+7MjZvcbDi7qrGl3wVL7Rrhl1JpZJgGBMOhUN0zgDL0eUTHlrkl/Hf+vY1xcJDZ29zyilYVlH+VFe/I9AixBIGwCSQSJt4YpWKJx9SceBYGBM3UtRkElLu4pJAw2d99zacGhs7seV+ku0pDfhrDp+OakQAQx9Tnikd2LrOja3VubDLHHx5Msam0pBZCoKh+noaQkGFf9HaN7qIt2ztZoN3eUCtzNLuWlIHRzgc+moaZUUKaiuzICs8FKcIRSbUCkNFLBWK+c7lATI5euaI6a6un2GKS3j6mXiBo6jpod04wmTYCPShLVuCnQpxPJtZB8dLmLx6cZDEb4bHJadvXX71xxdM4nGxHP0KdMs5LgFOCtAKrypAdVFgEk8XTSA7FYT7T5//qbt1WwZiIjZ5nV6qs+jhTe6ql98h9rKilMFi34kIeCkG2SZCsCmQKY//rnz7fe/h53fG/vl9FK+nF7ZwK2Khc6foZR3LJy868u8ios2Rmvt3ej4eGV+o2gC0b7j95n/QyU2hcLNEsQAAAABJRU5ErkJggg==";

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
        return "<h1>{$this->title}</h1>
                <div class='nette-inner'>Todo verze systemu</div>";
    }
}
