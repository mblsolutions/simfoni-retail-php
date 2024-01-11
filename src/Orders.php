<?php

namespace MBLSolutions\SimfoniRetail;

use MBLSolutions\SimfoniRetail\Base\Base;

class Orders extends Base
{
    public $maxWait = 10;

    protected $endpoint = 'order';

    /**
     * @param array $params
     * @param array|null $headers
     *
     * @return array
     */
    public function create(array $params, array $headers = []): array
    {
        return $this->getApiRequestor()->postRequest("/api/{$this->endpoint}", $params, array_merge([
            'X-Max-Wait' => $this->maxWait
        ], $headers));
    }

    /**
     * Create a bulk order
     *
     * @param array $params
     * @param array $headers
     * @return array
     */
    public function createBulkOrder(array $params, array $headers = []): array
    {
        return $this->getApiRequestor()->postRequest("/api/{$this->endpoint}/bulk", $params, array_merge([
            'X-Max-Wait' => 0
        ], $headers));
    }

    /**
     * Cancel an order
     * 
     * @param string $id
     * @param array $headers
     */
    public function cancel(string $id, array $headers = []): array
    {
        return $this->getApiRequestor()->deleteRequest("/api/{$this->endpoint}/cancel/" . $id, [], array_merge([
            'X-Max-Wait' => $this->maxWait
        ], $headers));
    }
}
