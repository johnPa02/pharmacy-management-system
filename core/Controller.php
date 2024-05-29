<?php

class Controller {
    protected $model;
    protected $view;

    protected function model($model) {
        require_once "./app/model/" . $model . ".php";
        return new $model();
    }

    protected function view($view, $data = [], $returnAsString = false) {
        extract($data);
        ob_start();
        include "./app/view/{$view}.php"; 
        $content = ob_get_clean();

        if ($returnAsString) {
            return $content;
        } else {
            echo $content;
        }
    }

}

?>
