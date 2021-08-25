<?php

namespace MBLSolutions\SimfoniRetail\Tests\SimfoniRetail\Api;

use GuzzleHttp\Client;
use MBLSolutions\SimfoniRetail\Api\ApiRequestor;
use MBLSolutions\SimfoniRetail\Api\ApiResource;
use MBLSolutions\SimfoniRetail\Tests\TestCase;

class ApiResourceTest extends TestCase
{
    
    /** @test **/
    public function can_get_api_requestor(): void
    {
        $stub = $this->getMockBuilder(ApiResource::class)
                     ->getMock();

        self::assertInstanceOf(ApiRequestor::class, $stub->getApiRequestor());
    }

    /** @test **/
    public function can_set_api_requestor(): void
    {
        $stub = $this->getMockBuilder(ApiResource::class)
                     ->getMock();

        $newApiRequestor = new ApiRequestor(new Client);

        self::assertInstanceOf(ApiRequestor::class, $stub->setApiRequestor($newApiRequestor));
    }
}
