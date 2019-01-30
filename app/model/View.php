<?php

class View
{
    private $layout;

    public function __construct($layout = "layout")
    {
        // basename - Returns trailing name component of path
        $this->layout = basename($layout);
    }

    public function render($name, $args = [])
    {
        /*
         * First, we need to "render" {view}.phtml and capture its output
         */

        /*
         * This function will turn output buffering on.
         * While output buffering is active no output is sent from the script (other than headers),
         * instead the output is stored in an internal buffer.
         *
         * The contents of this internal buffer may be copied into a string variable using ob_get_contents().
         * To output what is stored in the internal buffer, use ob_end_flush().
         * Alternatively, ob_end_clean() will silently discard the buffer contents.
         *
         */
        ob_start();
         //extract — Import variables into the current symbol table from an array
        extract($args);
        include BP . "app/view/$name.phtml";
        $content = ob_get_clean();

        /*
         * Then, we render {layout}.phtml and pass view output as $content
         */

        if ($this->layout) {
            include BP . "app/view/{$this->layout}.phtml";
        } else {
            echo $content;
        }
        return $this;
    }
}