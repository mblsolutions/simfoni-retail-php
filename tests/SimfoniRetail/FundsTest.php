<?php

namespace MBLSolutions\SimfoniRetail\Tests\SimfoniRetail;

use MBLSolutions\SimfoniRetail\Tests\TestCase;
use MBLSolutions\SimfoniRetail\Funds;

class FundsTest extends TestCase
{
    /** @var Funds $funds */
    protected $funds;

    /** {@inheritdoc} **/
    public function setUp(): void
    {
        parent::setUp();

        $this->funds = new Funds();
    }

    /** @test **/
    public function can_get_all(): void
    {
        $this->mockExpectedHttpResponse(
            [
            'data' => [
                    'id' => 2,
                    'name' => 'Debit',
                    'currency' => 'GBP',
                    'currency_icon' => 'https://simfoni-retail.test/img/currencies/gbp.svg',
                    'amount' => 57274,
                    'last_updated' => '2021-07-20T16:43:31.000000Z'
                ],
                [
                    'id' => 'debit_EUR',
                    'name' => 'Debit',
                    'currency' => 'EUR',
                    'currency_icon' => 'https://simfoni-retail.test/img/currencies/eur.svg',
                    'amount' => 0,
                    'last_updated' => null
                ],
                [
                    'id' => 'debit_USD',
                    'name' => 'Debit',
                    'currency' => 'USD',
                    'currency_icon' => 'https://simfoni-retail.test/img/currencies/usd.svg',
                    'amount' => 0,
                    'last_updated' => null
                ],
            ]
        );

        $response = $this->funds->select();

        $this->assertEquals($response, $this->getMockedResponseBody());
    }
}
