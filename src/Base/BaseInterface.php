<?php

namespace MBLSolutions\SimfoniRetail\Base;

interface BaseInterface
{
    public function all(?int $page = null, ?int $perPage = null): array;
    public function show($id): array;
    public function select(): array;
}
