<?php

use Framework\Http\RequestFactory;

require __DIR__ . '/../vendor/autoload.php';

$request = RequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'guest';

echo 'Hello ' . $name . '!';