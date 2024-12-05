<?php

namespace AlgoYounes\Bindify\Contracts;

use AlgoYounes\Bindify\Contexts\BindContext;

interface BindifyResolver
{
    public function resolve(string $abstract): ?BindContext;
}
