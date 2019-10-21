<?php


namespace Tests\Unit;

use App\Services\ExampleService;
use Tests\TestCase;

class ExampleServiceTest extends TestCase
{
    private $exampleService;
    protected function setUp(): void
    {
        parent::setUp();
        $this->exampleService = new ExampleService();
    }

    public function testExampleTextSearch()
    {
        $this->exampleService->exampleTextSearch([
            'key' => 'asdasdasd',
        ]);
    }
}
