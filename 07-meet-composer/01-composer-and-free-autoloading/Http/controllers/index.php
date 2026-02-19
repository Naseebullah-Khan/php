<?php

// in order for this to work first you have to start the session with session_start() function otherwise it will not work.
$_SESSION["name"] = "Naseebullah";

view(
    path: "index.view.php",
    attributes: [
        'heading' => 'Home',
    ]
);
