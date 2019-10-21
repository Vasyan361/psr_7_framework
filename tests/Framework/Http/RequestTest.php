<?php


namespace Tests\Framework\Http;


use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $_GET = [];
        $_POST = [];
    }

    public function testEmpty(): void
    {
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

        $request = new Request();

        $this->assertEquals($data, $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    public function testPArsedBody(): void
    {
        $data = ['title' => 'Title'];

        $_POST = $data;

        $request = new Request();

        $this->assertEquals([], $request->getQueryParams());
        $this->assertEquals($data, $request->getParsedBody());
    }
}