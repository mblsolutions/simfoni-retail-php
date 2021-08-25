<?php

namespace MBLSolutions\SimfoniRetail\Auth;

use MBLSolutions\SimfoniRetail\Exceptions\MissingTokenException;

class SimfoniRetail
{
    /** @var string $baseUri */
    private static $baseUri = 'https://development.simfoni.io';

    /** @var string $token */
    private static $token;

    /** @var bool $verify */
    private static $verifySSL = true;

    const AGENT = 'Simfoni-Retail-PHP';

    const VERSION = '1';

    /**
     * Override the default baseUri
     *
     * @param string $baseUri
     * @return void
     */
    public static function setBaseUri(string $baseUri = null): void
    {
        if ($baseUri) {
            self::$baseUri = $baseUri;
        }
    }

    /**
     * Get the Simfoni Retail Base URI
     *
     * @return string
     */
    public static function getBaseUri(): string
    {
        return self::$baseUri;
    }

    /**
     * Set the Bearer Token
     *
     * @param string $token
     * @return void
     */
    public static function setToken($token)
    {
        self::$token = $token;
    }

    /**
     * Get the Bearer Token
     *
     * @return string
     * @throws MissingTokenException
     */
    public static function getToken(): string
    {
        $token = self::$token;

        if ($token === null) {
            throw new MissingTokenException('Missing Bearer Token in Simfoni Retail Configuration');
        }

        return $token;
    }

    /**
     * Set Verify SSL
     *
     * @param bool $verify
     * @return void
     */
    public static function setVerifySSL(bool $verify): void
    {
        self::$verifySSL = $verify;
    }

    /**
     * Get Verify SSL
     *
     * @return bool
     */
    public static function getVerifySSL(): bool
    {
        return self::$verifySSL;
    }
}
