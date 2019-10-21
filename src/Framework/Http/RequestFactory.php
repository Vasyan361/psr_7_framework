<?php

namespace Framework\Http;

class RequestFactory
{
    public static function fromGlobals(array $query = null, ?array $data = null): Request
    {
        return (new Request())
            ->withQueryParams($query ?: $_GET)
            ->withParsedBody($data ?: $_POST);
    }
}
