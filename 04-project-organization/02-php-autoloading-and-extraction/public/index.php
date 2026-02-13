<?php

const BASE_PATH = __DIR__ . "/../";


require BASE_PATH . "functions.php";

spl_autoload_register(callback: function ($class): void {
    require base_path(path: "Core/{$class}.php");
});

require base_path(path: "router.php");
