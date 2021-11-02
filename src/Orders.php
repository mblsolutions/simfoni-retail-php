<?php

namespace MBLSolutions\SimfoniRetail;

use MBLSolutions\SimfoniRetail\Base\Base;

class Orders extends Base
{
    protected $endpoint = 'order';

    /**
     * @param array $params
     * @param array|null $headers
     *
     * @return array
     */
    public function create(array $params, array $headers = []): array
    {
        return $this->getApiRequestor()->postRequest("/api/{$this->endpoint}", $params, $headers);
    }

    /**
     * Create a bulk order
     *
     * @param array $params
     * @return array
     */
    public function createBulkOrder(array $params): array
    {
        return $this->getApiRequestor()->postRequest("/api/{$this->endpoint}/bulk", $params);
    }
}
