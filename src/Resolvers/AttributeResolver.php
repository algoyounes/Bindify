<?php

namespace AlgoYounes\Bindify\Resolvers;

use AlgoYounes\Bindify\Attributes\BindWith;
use AlgoYounes\Bindify\Contexts\BindContext;
use AlgoYounes\Bindify\Contracts\BindifyResolver;
use ReflectionAttribute;
use ReflectionClass;

class AttributeResolver implements BindifyResolver
{
    public function resolve(string $abstract): ?BindContext
    {
        if (! interface_exists($abstract)) {
            return null;
        }

        $attributes = (new ReflectionClass($abstract))
            ->getAttributes(BindWith::class, ReflectionAttribute::IS_INSTANCEOF);

        if (count($attributes) !== 1) {
            return null;
        }

        $bindWith = $attributes[0]->newInstance();
        if (! $bindWith instanceof BindWith) {
            return null;
        }

        $concretes = array_filter(
            array_unique($bindWith->getConcrete()),
            static fn (string $concrete): bool => class_exists($concrete)
                && is_subclass_of($concrete, $abstract)
        );

        if ($concretes === []) {
            return null;
        }

        return new BindContext($abstract, $concretes, $bindWith->getType(), $bindWith->getTag());
    }
}
