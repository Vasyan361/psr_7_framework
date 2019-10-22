<?php

use Framework\Http\RequestFactory;
use Framework\Http\Response;

require __DIR__ . '/../vendor/autoload.php';

$request = RequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'guest';

$response = new Response('Hello, ' . $name . '!');

header('HTTP/1.0 ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase());
foreach ($response->getHeaders() as $name => $value) {
    header($name . ':' . $value);
}
echo $response->getBody();