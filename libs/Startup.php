<?php

class Startup {

    private $_url = null;
    private $_controller = null;
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_defaultFile = 'index.php';
    private $_errorFile = 'pagenotfound.php';

    /**
     * Strats the init
     * @return boolean
     */
    public function init() {
        $this->_getUrl(); //Sets the private $_url
//        var_dump($this->_url);
        //load the default controller if no URL is set
        if (empty($this->_url[0]) ) {//when ask for root directory
//            echo 'default controller /';
            $this->_loadDefaultController();
            return FALSE;
        }
//        echo 'Existing controller'; die;
        $this->_loadExistingController();
        $this->_callControllerMethord();
    }//end of init function

  
    /**
     * Fetches the REQUEST_URI from 'url'
     */
    private function _getUrl() {
         $url = isset($_GET['url']) ? $_GET['url'] : null; //getting paramiters from url via htaccess
        $url = trim($url, '/'); //removing additional '/ ' from url
        $url = filter_var($url, FILTER_SANITIZE_URL); //removing unnecessory entries in url(like \%/)     
        $this->_url = explode("/", $url); //deviding url into parts with '/'
    }

    /**
     * This loads if there is no getUrl parrameter passed
     */
    private function _loadDefaultController() {
        require $this->_controllerPath . $this->_defaultFile;//loading controllers/index.php
        $this->_controller = new Index(); //setting _controler to controllers/index->Index class
        $this->_controller->loadModel('index', $this->_modelPath); //loading index_model for initial loading with libs/Controller.php->loadModel
        $this->_controller->index(); //executing index function for rendering controllers/index.php page
    }

    /**
     * Load an exsiting controller if there is a getUrl parameter passed
     * @return boolean|string
     */
    private function _loadExistingController() {
        $file = $this->_controllerPath . $this->_url[0] . '.php'; // assigning controller
        if (file_exists($file)) {
            require $file; //getting files from controller
//            echo 'Existing controller /'; 
//            echo $this->_url[1]; 
            $this->_controller = new $this->_url[0]; //setting $controler to controllers->$url[1].php
            $this->_controller->loadModel($this->_url[0], $this->_modelPath); //load models from libs/Controller.php
        } else {
//            echo 'No controller->default controller /';
            $this-> _loadDefaultController();//goto index page
            return FALSE;
        }
    }

    private function _callControllerMethord() {
        $length = count($this->_url);
//        echo $length; 
        //Make sure the methord is exisits
        If ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {//checking method _url[1] in controllers/_url[0].php
//                echo 'no method';
                $this->_error('No Method //');
            }
        }
        //Determines what to load
        switch ($length) {
            case 5:
                //Controller->Methord(Param1, Param2, Param3)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            case 4:
                //Controller->Methord(Param1, Param2)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            case 3:
                //Controller->Methord(Param1)
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:
                //Controller->Methord()
                $this->_controller->{$this->_url[1]}();
                break;
            default:
                $this->_controller->index();
                break;
        }
    }

    /**
     * Display an error page if nothing exisits
     * @return boolean|string
     */
    private function _error($error) {
//      echo 'Error being called'; die;
        require $this->_controllerPath . $this->_errorFile;//controllers/pagenotfound.php
//        echo 'Error being called';
        $this->_controller = new PageNotFound();
        $this->_controller->index($error);
        exit;
    }

}
