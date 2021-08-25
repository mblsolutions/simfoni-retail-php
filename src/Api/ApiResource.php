<?php

namespace MBLSolutions\SimfoniRetail\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use MBLSolutions\SimfoniRetail\Auth\SimfoniRetail;

abstract class ApiResource
{
    /** @var ApiRequestor $apiRequestor */
    private $apiRequestor;

    /**
     * Simfoni Retail API Resource
     *
     * @param ClientInterface|null $client
     */
    public function __construct(ClientInterface $client = null)
    {
        if ($client === null) {
            $client = new Client([
                'base_uri' => SimfoniRetail::getBaseUri()
            ]);
        }

        $this->apiRequestor = new ApiRequestor($client);
    }

    /**
     * Get an API Requestor Instance
     *
     * @return ApiRequestor
     */
    public function getApiRequestor(): ApiRequestor
    {
        return $this->apiRequestor;
    }

    /**
     * Set a new instance of the API Requestor
     *
     * @param ApiRequestor $apiRequestor
     * @return ApiRequestor
     */
    public function setApiRequestor(ApiRequestor $apiRequestor): ApiRequestor
    {
        $this->apiRequestor = $apiRequestor;

        return $this->apiRequestor;
    }
}
