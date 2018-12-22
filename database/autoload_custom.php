<?php

spl_autoload_register('autoloadSrc');


function autoloadSrc($className) {
    $dirClass = str_replace('\\', '/', $className);
    $pathClass = "src/{$dirClass}.php";
    //var_dump($pathClass);
    if (file_exists($pathClass)) {
        require_once $pathClass;
    }

}