<?php

namespace MBLSolutions\SimfoniRetail\Api;

use GuzzleHttp\Client;
use MBLSolutions\SimfoniRetail\Auth\SimfoniRetail;

abstract class OAuthResource extends ApiResource
{

    /**
     * Simfoni Retail OAuth Resource
     */
    public function __construct()
    {
        parent::__construct();

        $client = new Client([
            'base_uri' => SimfoniRetail::getBaseUri(),
        ]);

        $this->setApiRequestor(new ApiRequestor($client));
    }
}
