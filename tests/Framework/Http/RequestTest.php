<?php


namespace Tests\Framework\Http;


use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testEmpty(): void
    {
        $_GET = [];
        $_POST = [];

        $request = new Request();

        $this->assertEquals([], $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $data = [
            'name' => 'John',
            'age' => 28,
        ];

        $_GET = $data;
        $_POST = [];

        $request = new Request();

        $this->assertEquals($data, $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    public function testPArsedBody(): void
    {
        $data = ['title' => 'Title'];

        $_GET = [];
        $_POST = $data;

        $request = new Request();

        $this->assertEquals([], $request->getQueryParams());
        $this->assertEquals($data, $request->getParsedBody());
    }
}