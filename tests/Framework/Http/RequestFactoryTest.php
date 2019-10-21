<?php

namespace Tests\Framework\Http;

use Framework\Http\Request;
use Framework\Http\RequestFactory;
use PHPUnit\Framework\TestCase;

class RequestFactoryTest extends TestCase
{
    public function testEmpty(): void
    {
        $request = RequestFactory::fromGlobals();

        $this->assertInstanceOf(Request::class, $request);
        $this->assertEquals([], $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $data = [
            'name' => 'John',
            'age' => 28,
        ];

        $request = RequestFactory::fromGlobals($data);;

        $this->assertInstanceOf(Request::class, $request);
        $this->assertEquals($data, $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    public function testPArsedBody(): void
    {
        $data = ['title' => 'Title'];

        $request = RequestFactory::fromGlobals([], $data);

        $this->assertInstanceOf(Request::class, $request);
        $this->assertEquals([], $request->getQueryParams());
        $this->assertEquals($data, $request->getParsedBody());
    }
}
