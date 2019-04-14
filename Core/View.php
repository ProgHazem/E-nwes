<?php

namespace Core;

class View{

    /**
     * Render a view file
     *
     * @param string $view  The view file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function render($view, $args = []){
        extract($args, EXTR_SKIP);
        $file = ROOT_VIEWS_PATH . $views;
        if(\is_readable($file))
            require $file;
        else echo "$file not found";
    }
    /**
     * Render a view template using Twig
     *
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate($temp, $args = []){
        static $twig = null;
        if($twig === null){
            $loader = new \Twig_Loader_Filesystem(ROOT_VIEWS_PATH);
            $twig = new \Twig_Environment($loader);
        }
        echo $twig->render($temp, $args);
    }
}

?>