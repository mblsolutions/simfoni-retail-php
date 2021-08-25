<?php

namespace MBLSolutions\SimfoniRetail\Tests\SimfoniRetail;

use MBLSolutions\SimfoniRetail\Tests\TestCase;
use MBLSolutions\SimfoniRetail\Products;

class ProductsTest extends TestCase
{
    /** @var Products $products */
    protected $products;

    /** {@inheritdoc} **/
    public function setUp(): void
    {
        $this->products = new Products();
    }

    /** @test **/
    public function can_get_all(): void
    {
        $this->mockExpectedHttpResponse(
            [
                'data' => [
                    "sku" => "GREGGS_50_DIGITAL",
                    "name" => "Greggs 50 Digital",
                    "brand" => "Greggs PLC",
                    "type" => "digital",
                    "currency" => "GBP",
                    "discount" => 400,
                    "tax" => 0,
                    "min_value" => null,
                    "max_value" => null,
                    "delay" => false,
                    "active" => true,
                    "denominations" => [
                        1000,
                        2500,
                        5000
                    ],
                    "meta" => [
                            "description" => "Sed fermentum volutpat neque, sit amet sollicitudin massa hendrerit nec.",
                            "image" => "https://abcd1234.cloudfront.net/products/GreggsDigital.jpg",
                            "in_store" => true,
                            "online" => true,
                            "telephone" => false,
                            "redemption_instructions_url" => "https://example.org/redemption",
                            "terms_and_conditions_url" => "https://example.org/terms-of-service",
                            "redemption_instructions_copy" => "Integer bibendum gravida lobortis. Pellentesque eget dapibus enim.",
                            "terms_and_conditions_copy" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at tempus est, quis pulvinar augue."
                        ]
                 ],
                 [
                    "sku" => "GREGGS_50_DIGITAL",
                    "name" => "Greggs 50 Digital",
                    "brand" => "Greggs PLC",
                    "type" => "digital",
                    "currency" => "GBP",
                    "discount" => 400,
                    "tax" => 0,
                    "min_value" => null,
                    "max_value" => null,
                    "delay" => false,
                    "active" => true,
                    "denominations" => [
                        1000,
                        2500,
                        5000
                    ],
                    "meta" => [
                            "description" => "Sed fermentum volutpat neque, sit amet sollicitudin massa hendrerit nec.",
                            "image" => "https://abcd1234.cloudfront.net/products/GreggsDigital.jpg",
                            "in_store" => true,
                            "online" => true,
                            "telephone" => false,
                            "redemption_instructions_url" => "https://example.org/redemption",
                            "terms_and_conditions_url" => "https://example.org/terms-of-service",
                            "redemption_instructions_copy" => "Integer bibendum gravida lobortis. Pellentesque eget dapibus enim.",
                            "terms_and_conditions_copy" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at tempus est, quis pulvinar augue."
                        ]
                 ],
            ]
        );

        $response = $this->products->all();

        $this->assertEquals($response, $this->getMockedResponseBody());
    }

    /** @test **/
    public function can_show_one(): void
    {
        $this->mockExpectedHttpResponse(
            [
                'data' => [
                    "sku" => "GREGGS_50_DIGITAL",
                    "name" => "Greggs 50 Digital",
                    "brand" => "Greggs PLC",
                    "type" => "digital",
                    "currency" => "GBP",
                    "discount" => 400,
                    "tax" => 0,
                    "min_value" => null,
                    "max_value" => null,
                    "delay" => false,
                    "active" => true,
                    "denominations" => [
                        1000,
                        2500,
                        5000
                    ],
                    "meta" => [
                            "description" => "Sed fermentum volutpat neque, sit amet sollicitudin massa hendrerit nec.",
                            "image" => "https://abcd1234.cloudfront.net/products/GreggsDigital.jpg",
                            "in_store" => true,
                            "online" => true,
                            "telephone" => false,
                            "redemption_instructions_url" => "https://example.org/redemption",
                            "terms_and_conditions_url" => "https://example.org/terms-of-service",
                            "redemption_instructions_copy" => "Integer bibendum gravida lobortis. Pellentesque eget dapibus enim.",
                            "terms_and_conditions_copy" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at tempus est, quis pulvinar augue."
                        ]
                ]
            ]
        );

        $response = $this->products->show("JOJO_DIGITAL");

        $this->assertEquals($response, $this->getMockedResponseBody());
    }
}
