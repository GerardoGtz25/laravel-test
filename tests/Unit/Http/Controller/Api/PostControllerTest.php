<?php

namespace Tests\Unit\Http\Controller\Api;

use Mockery;
use PHPUnit\Framework\TestCase;

use App\Http\Controllers\Api\PostController;

class PostControllerTest extends TestCase
{
    protected $request;
    protected $modelMock;

    public function tearDown() : void
    {
        Mockery::close();
    }

    public function setUp() : void
    {
        parent::setUp();

        $this->modelMock = Mockery::mock('Eloquent', 'App\Post');
    }


    public function testExample()
    {
        $controller = new PostController($this->modelMock);

        $this->modelMock
            ->shouldReceive('paginate')
            ->once()
            ->andReturn('paginatedPosts');

        $response = $controller->index();
        $this->assertEquals('paginatedPosts', $response);
    }
}
