<?php

const BASE_PATH = __DIR__ . "/../";


require BASE_PATH . "Core/functions.php";

spl_autoload_register(callback: function ($class): void {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path(path: "{$class}.php");
});

require base_path(path: "Core/router.php");
