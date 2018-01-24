<?php

class Controller {

    function __construct() {
        $this->view = new View(); //creating new view class of lib/view.php
    }

    /**
     * Loading model
     * @param string $name Name of the model
     * @param string $modelPath Location of the models
     */
    public function loadModel($name, $modelPath ) {
        $modelFile = $modelPath . $name . "_model.php";//models/name_model.php
        if (file_exists($modelFile)) {
            require $modelFile;
            $modelName = $name . '_model';
            $this->model = new $modelName();//getting Name_Model calss
        }
    }

}
