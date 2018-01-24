<?php
class View {
    
 /*
 * creating page with relevant content
 */
    public function render($name){
        require 'views/header.php';
        require 'views/'. $name. '.php';
        require 'views/footer.php';

    }
}

