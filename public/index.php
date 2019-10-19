<?php

use Framework\Http\Request;

require __DIR__ . '/../vendor/autoload.php';

$request = new Request();

$name = $request->getQueryParams()['name'] ?? 'guest';

echo 'Hello ' . $name . '!';