<?php

use Framework\Http\Request;

require __DIR__ . '/../vendor/autoload.php';

$request = (new Request())
    ->withQueryParams($_GET)
    ->withParsedBody($_POST);

$name = $request->getQueryParams()['name'] ?? 'guest';

echo 'Hello ' . $name . '!';