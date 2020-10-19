<?php

namespace Tests\Unit\Http\Requests;

use PHPUnit\Framework\TestCase;
use App\Http\Requests\Post;

class PostRequestTest extends TestCase
{
    protected $request;

    public function setUp() : void
    {
        $this->request = new Post;;
    }

    public function testAuthorize()
    {
        $this->assertTrue($this->request->authorize());
    }

    public function testRules()
    {
        $rules = $this->request->rules();
        $this->assertArrayHasKey('title', $rules);
        $this->assertEquals($rules['title'], 'required');
    }
}
