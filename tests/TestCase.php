<?php

namespace AlgoYounes\Bindify\Tests;

use AlgoYounes\Bindify\Resolvers\AttributeResolver;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected AttributeResolver $attributeResolver;

    protected function setUp(): void
    {
        parent::setUp();

        $this->attributeResolver = new AttributeResolver;
    }

    protected function getResolver(): AttributeResolver
    {
        return $this->attributeResolver;
    }
}
