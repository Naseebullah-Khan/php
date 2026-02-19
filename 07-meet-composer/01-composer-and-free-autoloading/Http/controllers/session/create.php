<?php

use Core\Session;

view(path: "session/create.view.php", attributes: ["errors" => Session::get(key: "errors", default: [])]);
