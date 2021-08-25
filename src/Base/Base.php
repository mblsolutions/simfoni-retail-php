<?php

namespace MBLSolutions\SimfoniRetail\Base;

use MBLSolutions\SimfoniRetail\Api\ApiResource;

abstract class Base extends ApiResource implements BaseInterface
{

    /**
     * Base endpoint uri for methods
     *
     * @var string
     */
    private $endpoint = null;

    /**
     * View all endpoint resources
     *
     * @param int|null $page
     * @return array
     */
    public function all(int $page = null, int $perPage = null): array
    {
        return $this->getApiRequestor()->getRequest("/api/{$this->endpoint}", [
            'page' => $page,
            'per_page' => $perPage
        ]);
    }

    /**
     * Show single resource
     *
     * @param $id
     * @return array
     */
    public function show($id): array
    {
        return $this->getApiRequestor()->getRequest("/api/{$this->endpoint}" . $id);
    }

    /**
     *
     * @return array
     */
    public function select(): array
    {
        return $this->getApiRequestor()->getRequest("/api/{$this->endpoint}/select");
    }
}
