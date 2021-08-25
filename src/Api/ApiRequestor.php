<?php

namespace MBLSolutions\SimfoniRetail\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use MBLSolutions\SimfoniRetail\Exceptions\MissingTokenException;
use MBLSolutions\SimfoniRetail\Auth\SimfoniRetail;

class ApiRequestor
{
    /** @var ClientInterface $guzzle */
    private static $guzzle;

    /**
     * Create a new API Requestor Instance
     *
     * @param ClientInterface|null $guzzle
     */
    public function __construct(ClientInterface $guzzle)
    {
        self::$guzzle = $guzzle;
    }

    /**
     * Get the HTTP Client
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return self::$guzzle;
    }

    /**
     * Set the HTTP Client
     *
     * @param ClientInterface $guzzle
     */
    public static function setHttpClient(ClientInterface $guzzle)
    {
        self::$guzzle = $guzzle;
    }

    /**
     * Make a Get Request
     *
     * @param string $uri
     * @param array $params
     * @param array|null $headers
     * @return array
     * @throws mixed
     */
    public function getRequest(string $uri, array $params = [], array $headers = null): array
    {
        return $this->makeHttpRequest('get', $uri, [
            'headers' => $headers !== null ? $this->defaultHeaders($headers) : $this->authenticatedHeaders(),
            'query' => $params,
            'verify' => SimfoniRetail::getVerifySSL()
        ]);
    }

    /**
     * Make a Post Request
     *
     * @param string $uri
     * @param array $params
     * @param array|null $headers
     * @return array
     * @throws mixed
     */
    public function postRequest(string $uri, array $params = [], array $headers = null): array
    {
        return $this->makeHttpRequest('post', $uri, [
            'headers' => $headers !== null ? $this->defaultHeaders($headers) : $this->authenticatedHeaders(),
            'json' => $params,
            'verify' => SimfoniRetail::getVerifySSL()
        ]);
    }

    /**
     * Make a Patch Request
     *
     * @param string $uri
     * @param array $params
     * @param array|null $headers
     * @return array
     * @throws mixed
     */
    public function patchRequest(string $uri, array $params = [], array $headers = null): array
    {
        return $this->makeHttpRequest('patch', $uri, [
            'headers' => $headers !== null ? $this->defaultHeaders($headers) : $this->authenticatedHeaders(),
            'json' => $params,
            'verify' => SimfoniRetail::getVerifySSL()
        ]);
    }

    /**
     * Make a Delete Request
     *
     * @param string $uri
     * @param array $params
     * @param array|null $headers
     * @return array
     * @throws mixed
     */
    public function deleteRequest(string $uri, array $params = [], array $headers = null): array
    {
        return $this->makeHttpRequest('delete', $uri, [
            'headers' => $headers !== null ? $this->defaultHeaders($headers) : $this->authenticatedHeaders(),
            'query' => $params,
            'verify' => SimfoniRetail::getVerifySSL()
        ]);
    }

    /**
     * Get the Default Request Headers
     *
     * @param array $headers
     * @return array
     */
    public function defaultHeaders(array $headers = []): array
    {
        return array_merge($headers, [
            'User-Agent' => SimfoniRetail::AGENT . '/' . SimfoniRetail::VERSION,
            'Accept'     => 'application/json',
        ]);
    }

    /**
     * Get the Authenticated Request Headers
     *
     * @return array
     * @throws MissingTokenException
     */
    public function authenticatedHeaders(): array
    {
        return array_merge([
            'Authorization' => 'Bearer ' . SimfoniRetail::getToken(),
        ], $this->defaultHeaders());
    }

    /**
     * Make a HTTP Request
     *
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return void|array
     * @throws mixed
     */
    private function makeHttpRequest(string $method, string $uri, array $options = [])
    {
        try {
            $response = $this->getHttpClient()->request($method, $uri, $options);

            return json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $exception) {
            HttpRequestError::handle($exception);
        }
    }
}
