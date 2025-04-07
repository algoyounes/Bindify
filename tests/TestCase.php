<?php

namespace AlgoYounes\Bindify\Tests;

use AlgoYounes\Bindify\Resolvers\AttributeResolver;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected AttributeResolver $attributeResolver;

    protected function getEnvironmentSetUp($app): void
    {
        $this->attributeResolver = app(AttributeResolver::class);
    }

    protected function getPackageProviders($app): array
    {
        return [
            \AlgoYounes\Bindify\Providers\BindifyServiceProvider::class,
        ];
    }

    protected function getResolver(): AttributeResolver
    {
        return $this->attributeResolver;
    }
}
