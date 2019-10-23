<?php


namespace Tests\Framework\Http;


use PHPUnit\Framework\TestCase;
use Zend\Diactoros\ServerRequest;

class RequestTest extends TestCase
{
    public function testEmpty(): void
    {
        $request = new ServerRequest();

        $this->assertEquals([], $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $data = [
            'name' => 'John',
            'age' => 28,
        ];

        $request = (new ServerRequest())
            ->withQueryParams($data);

        $this->assertEquals($data, $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    public function testPArsedBody(): void
    {
        $data = ['title' => 'Title'];

        $request = (new ServerRequest())
            ->withParsedBody($data);

        $this->assertEquals([], $request->getQueryParams());
        $this->assertEquals($data, $request->getParsedBody());
    }
}