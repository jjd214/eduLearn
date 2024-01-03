<?php

session_start();

session_unset();

session_destroy();

header("Location: /eduLearn/views/index.php");

?>