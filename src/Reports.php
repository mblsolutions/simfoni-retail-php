<?php

namespace MBLSolutions\SimfoniRetail;

use MBLSolutions\SimfoniRetail\Base\Base;

class Reports extends Base
{
    private $endpoint = 'reports';

    /**
     *
     * @return array
     */
    public function export(): array
    {
        return $this->getApiRequestor()->getRequest("/api/{$this->endpoint}/select");
    }
}
