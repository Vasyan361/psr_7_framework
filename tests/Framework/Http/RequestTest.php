<?php


namespace Tests\Framework\Http;


use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
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

        $request = (new Request())
            ->withQueryParams($data);

        $this->assertEquals($data, $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    public function testPArsedBody(): void
    {
        $data = ['title' => 'Title'];

        $request = (new Request())
            ->withParsedBody($data);

        $this->assertEquals([], $request->getQueryParams());
        $this->assertEquals($data, $request->getParsedBody());
    }
}