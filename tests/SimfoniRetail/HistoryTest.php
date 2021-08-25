<?php

namespace MBLSolutions\SimfoniRetail\Tests\SimfoniRetail;

use MBLSolutions\SimfoniRetail\Tests\TestCase;
use MBLSolutions\SimfoniRetail\History;

class HistoryTest extends TestCase
{
    /** @var History $history */
    protected $history;

    /** {@inheritdoc} **/
    public function setUp(): void
    {
        $this->history = new History();
    }

    /** @test **/
    public function can_get_all(): void
    {
        $this->mockExpectedHttpResponse(
            [
            'data' => [
                    'uuid' => 'd089de91-8414-443b-bd6d-efef6f47c72f',
                    'product' => 'Hobbycraft Digital e-Code',
                    'sku' => 'HC_DIG_B2B_GBP',
                    'currency' => 'GBP',
                    'order_status' => 'processing',
                    'gross_value' => 2000,
                    'net_value' => 1800,
                    'discount' => 1000,
                    'reference' => 'TEST-ORDER-2',
                    'created_at' => '2021-01-01T13:15:30.000000Z'
                ],
                [
                    'uuid' => 'd089de91-8414-443b-bd6d-efef6f47c72f',
                    'product' => 'Hobbycraft Digital e-Code',
                    'sku' => 'HC_DIG_B2B_GBP',
                    'currency' => 'GBP',
                    'order_status' => 'processing',
                    'gross_value' => 2000,
                    'net_value' => 1800,
                    'discount' => 1000,
                    'reference' => 'TEST-ORDER-2',
                    'created_at' => '2021-01-01T13:15:30.000000Z'
                ]
            ]
        );

        $response = $this->history->all();

        $this->assertEquals($response, $this->getMockedResponseBody());
    }

    /** @test **/
    public function can_show(): void
    {
        $this->mockExpectedHttpResponse(
            [
                'data' => [
                    'uuid' => 'd089de91-8414-443b-bd6d-efef6f47c72f',
                    'product_name' => 'Hobbycraft Digital e-Code',
                    'order_status' => 'processing',
                    'reference' => 'TEST-ORDER-1',
                    'sku' => 'HC_DIG_B2B_GBP',
                    'gross_value' => 1000,
                    'net_value' => 900,
                    'discount' => 1000,
                    'transaction_fee' => 0,
                    'created_at' => '2021-01-01T13:15:30.000000Z',
                    'details' => [
                        'serial' => null,
                        'code' => 1234567890123456,
                        'pin' => 1234,
                        'url' => 'https://redeem.simfoni.co.uk/POW0e6Kay9vVjYLb30DzCCPVWYgUUSek',
                        'activation' => null,
                        'expiration' => null
                    ]
                ]
            ]
        );

        $response = $this->history->show(rand());

        $this->assertEquals($response, $this->getMockedResponseBody());
    }
}
