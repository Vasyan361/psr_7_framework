<?php

namespace Tests\Framework\Http;

use Framework\Http\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testEmpty()
    {
        $body = 'Body';

        $response = new Response($body);

        $this->assertEquals($body, $response->getBody()->getContents());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('OK', $response->getReasonPhrase());
    }

    public function test404()
    {
        $body = 'Empty';
        $status = 404;

        $response = new Response($body, $status);

        $this->assertEquals($body, $response->getBody()->getContents());
        $this->assertEquals($status, $response->getStatusCode());
        $this->assertEquals('Not Found', $response->getReasonPhrase());
    }

    public function testHeaders()
    {
        $response = (new Response(''))
            ->withHeader($name1 = 'X-Header-1', $value1 = 'value_1')
            ->withHeader($name2 = 'X-Header-2', $value2 = 'value_2');

        $this->assertEquals([$name1 => [$value1], $name2 => [$value2]], $response->getHeaders());
    }
}