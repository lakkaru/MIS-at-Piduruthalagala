<?php
class PageNotFound extends Controller {
    function __construct() {
        parent::__construct();
    }
 function index($error){
//     echo 'Page Not Found Controller';
        echo $error;
     $this->view->title=$error;
        $this->view->render('pagenotfound/index');//sending paramiters to View() at lib/view.php
    }
}
