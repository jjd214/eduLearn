<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/e-commerce/controllers/functions.php';

spl_autoload_register(function($class) {
    require_once $_SERVER['DOCUMENT_ROOT'].'/eduLearn/backend/'.$class.'.php';
});

?>