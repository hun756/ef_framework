<?php

/**
 * @Base Controller
 *  Loads the models and views
 */
class Controller {
    // load model
    public function model($model) {
        require_once('./../model' . $model . '.php');

        // instentiate model
        return new $model();
    }

    // loafing view
    public function view($view, $data = []) {
        $filePath = './app/view/' . $view . '.php';
        if(file_exists($filePath)) {
            require_once($filePath);
        } else {
            die('View nor exist');
        }
    }
}
