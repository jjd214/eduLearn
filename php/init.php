<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/eduLearn/controllers/functions.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/eduLearn/vendor/autoload.php';

spl_autoload_register(function($class) {
    require_once $_SERVER['DOCUMENT_ROOT'].'/eduLearn/models/'.$class.'.php';
});

?>