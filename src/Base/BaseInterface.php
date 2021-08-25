<?php

namespace MBLSolutions\SimfoniRetail\Base;

interface BaseInterface
{
    public function all(int $page, int $perPage): array;
    public function show($id): array;
    public function select(): array;
}
