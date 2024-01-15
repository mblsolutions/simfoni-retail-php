<?php

namespace MBLSolutions\SimfoniRetail\Tests\SimfoniRetail;

use MBLSolutions\SimfoniRetail\Tests\TestCase;
use MBLSolutions\SimfoniRetail\Orders;

class OrdersTest extends TestCase
{
    /** @var Orders $orders */
    protected $orders;

    /** {@inheritdoc} **/
    public function setUp(): void
    {
        $this->orders = new Orders();
    }

    /** @test **/
    public function can_create(): void
    {
        $this->mockExpectedHttpResponse(
            [
                'data' => [
                    'details' => [
                        'serial' => 1234567890,
                        'code' => 1234567890123456,
                        'pin' => 1234,
                        'url' => 'https://redeem.simfoni.co.uk/brlIlcbXn1HAezp3XUHA5g3LmoZjxWco',
                        'activation' => '2021-01-01T08:04:38.000000Z',
                        'expiration' => '2023-01-01T08:04:38.000000Z'
                    ]
                ],
                201
            ]
        );

        $response = $this->orders->create([
            'reference' => uniqid(),
            'sku' => 'JOJO_DIGITAL',
            'value' => rand()
        ]);

        $this->assertEquals($response, $this->getMockedResponseBody());
    }

    /** @test **/
    public function can_create_delayed_order(): void
    {
        $this->mockExpectedHttpResponse(
            [
                'data' => [
                    'reference' => '742e5cdd-3212-4ec3-87b3-873a8ba3ab84',
                    'status' => 'processing',
                    'created_at' => '2021-08-09T08:42:11+00:00'
                ],
                202
            ]
        );

        $response = $this->orders->create([
            'reference' => uniqid(),
            'sku' => 'JOJO_DIGITAL',
            'value' => rand()
        ]);

        $this->assertEquals($response, $this->getMockedResponseBody());
    }

    /** @test **/
    public function can_show_order(): void
    {
        $this->mockExpectedHttpResponse(
            [
                'data' => [
                    "reference" => "ORDER-1",
                    "status" => "complete",
                    "created_at" => "2021-01-01T08:04:38.000000Z",
                    "items" => [
                        [
                            "value" => 2000,
                            "product" => "JOJO_DIGITAL",
                            "details" => [
                                "serial" => null,
                                "code" => 1234567890123456,
                                "pin" => 1234,
                                "url" => "https://redeem.simfoni.co.uk/POW0e6Kay9vVjYLb30DzCCPVWYgUUSek",
                                "activation" => null,
                                "expiration" => null
                            ]
                        ]
                    ]
                ],
                202
            ]
        );

        $response = $this->orders->show(uniqid());

        $this->assertEquals($response, $this->getMockedResponseBody());
    }

    /** @test **/
    public function can_cancel_order(): void
    {
        $this->mockExpectedHttpResponse(
            [
                'data' => [
                    'reference' => 'ORDER-1',
                    'status' => 'cancelled',
                ]
            ]
        );

        $response = $this->orders->cancel(uniqid());

        $this->assertEquals($response, $this->getMockedResponseBody());
    }
}
