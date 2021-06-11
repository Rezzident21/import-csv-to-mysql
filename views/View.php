<?php

class View
{

    /* class for render page from controller */
    public function render($template, $pageData)
    {
        include ROOT . $template;
    }

}