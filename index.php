<?php
require 'config.php';//database information
//require 'util/Auth.php';//user login infor
function __autoload($class){
    require LIBS. $class. ".php"; 
}

$approxConsumRate=30;
//getting start , starting libs/Startup.php
$startup =new Startup();
$startup->init();