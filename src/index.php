<?php
require_once "../vendor/autoload.php";

$list = [
    "parent 1" => [
        "child 1.1" => [],
        "child 1.2" => []
    ],
    "parent 2" => [
        "Child 2.1" => [],
    ],
];

\TodoListPatterns\Application\Main::start($list);