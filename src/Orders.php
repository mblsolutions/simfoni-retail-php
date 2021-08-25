<?php

namespace MBLSolutions\SimfoniRetail;

use MBLSolutions\SimfoniRetail\Base\Base;

class Orders extends Base
{
    private $endpoint = 'order';

    /**
     * Create a new Order
     *
     * @param array $params
     * @return array
     */
    public function create(array $params): array
    {
        return $this->getApiRequestor()->postRequest("/api/{$this->endpoint}", $params);
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
