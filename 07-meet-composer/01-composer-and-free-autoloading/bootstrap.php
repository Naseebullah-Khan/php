<?php

use Core\Database;
use Core\Container;
use Core\App;

$container = new Container();

$container->bind(key: "Core\Database", resolver: function (): Database {
    $config = require base_path(path: "config.php");
    return new Database(config: $config["database"]);
});

App::setContainer(container: $container);
