<?php

namespace MBLSolutions\SimfoniRetail\Tests\SimfoniRetail;

use MBLSolutions\SimfoniRetail\Tests\TestCase;
use MBLSolutions\SimfoniRetail\Reports;

class ReportsTest extends TestCase
{
    /** @var Reports $reports */
    protected $reports;

    /** {@inheritdoc} **/
    public function setUp(): void
    {
        $this->reports = new Reports();
    }

    /** @test **/
    public function can_show_one(): void
    {
        $this->mockExpectedHttpResponse(
            [
                "headings" => [
                    "Brand",
                    "Total Orders",
                    "Gross Value",
                    "Net Value"
                ],
                'data' => [
                    "current_page" => 1,
                    "data" => [
                        [
                          "Brand" => "JoJo Maman Bébé",
                          "Total Orders" => 16,
                          "Gross Value" => "400.00",
                          "Net Value" => "360.00"
                        ],
                        [
                          "Brand" => "Greggs PLC",
                          "Total Orders" => 20,
                          "Gross Value" => "1200.00",
                          "Net Value" => "1080.00"
                        ]
                    ],
                    "first_page_url" => "https://staging.simfoni.io/api/report/4?page=1",
                    "from" => 1,
                    "last_page" => 1,
                    "last_page_url" => "https://staging.simfoni.io/api/report/4?page=1",
                    "next_page_url" => "https://staging.simfoni.io/api/report/4?page=2",
                    "path" => "https://staging.simfoni.io/api/report/4",
                    "per_page" => 25,
                    "prev_page_url" => null,
                    "to" => 1,
                    "total" => 2
                ],
                "totals" => false,
                "drivers" => [
                    "0" => [
                        "value" => "f53d56c85d65936b3efeacfb0e2caecd800de9784d5d657eb37d7753e9ac35e0",
                        "name" => "CSV File (.csv)"
                    ],
                    "2" => [
                        "value" => "277291eb5d680dfcdfff73d699a86e8aa6b27b9472eef042cc10f9b6e9864c92",
                        "name" => "JSON File (.json)"
                    ],
                    "1" => [
                        "value" => "7f26d12c54b710efde2bfb5eb1df92144fcace65099206a74d4668e1351704c5",
                        "name" => "Print Report"
                    ]
                ]
            ]
        );

        $response = $this->reports->show(1);

        $this->assertEquals($response, $this->getMockedResponseBody());
    }

    /** @test **/
    public function can_export(): void
    {
        $this->mockExpectedHttpResponse([
            "uri" => "https://staging.simfoni.io/report/1/export?expires=01&uid=1&signature=abc1234"
        ]);

        $response = $this->reports->export(1);

        $this->assertEquals($response, $this->getMockedResponseBody());
    }
}