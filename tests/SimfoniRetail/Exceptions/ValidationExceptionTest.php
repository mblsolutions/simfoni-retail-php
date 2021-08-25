<?php

namespace MBLSolutions\SimfoniRetail\Tests\SimfoniRetail\Exceptions;

use MBLSolutions\SimfoniRetail\Exceptions\ValidationException;
use MBLSolutions\SimfoniRetail\Tests\TestCase;

class ValidationExceptionTest extends TestCase
{

    /** @test **/
    public function can_create_validation_exception()
    {
        $message = json_encode([
            'message' => 'The given data was invalid.',
            'errors' => [
                'name' => [
                    'This brand name has already been taken.'
                ],
                'programme_manager_email' => [
                    'This email address has already been taken.'
                ]
            ]
        ]);

        $exception = new ValidationException($message, 422);

        $this->assertEquals($exception->getMessage(), 'The given data was invalid.');
        $this->assertEquals(422, $exception->getCode());
        $this->assertEquals($exception->getValidationErrors(), [
            'name' => [
                'This brand name has already been taken.'
            ],
            'programme_manager_email' => [
                'This email address has already been taken.'
            ]
        ]);
    }
}
