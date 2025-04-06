<?php

use AlgoYounes\Bindify\Attributes\BindType;
use AlgoYounes\Bindify\Contexts\BindContext;
use Workbench\App\Contracts\DefaultBindTypeContract;
use Workbench\App\Contracts\MultipleAttributesContract;
use Workbench\App\Contracts\NoAttributeContract;
use Workbench\App\Contracts\SingletonBindingContract;
use Workbench\App\DefaultImplementationContract;

it('returns a binding from the interface attribute with the default type', function () {
    $context = BindContext::create(
        DefaultBindTypeContract::class,
        DefaultImplementationContract::class,
        BindType::Transient
    );

    $resolve = $this->attributeResolver->resolve(DefaultBindTypeContract::class);

    $this->assertEquals($context, $resolve);
});

it('returns a binding from the interface attribute with the singleton type', function () {
    $context = BindContext::create(
        SingletonBindingContract::class,
        DefaultImplementationContract::class,
        BindType::Singleton
    );

    $resolve = $this->attributeResolver->resolve(SingletonBindingContract::class);

    $this->assertEquals($context, $resolve);
});

it('returns null when the interface does not have the attribute', function () {
    $this->assertNull($this->attributeResolver->resolve(NoAttributeContract::class));
});

it('returns null when the interface does not exist', function () {
    $this->assertNull($this->attributeResolver->resolve('NonExistentInterface'));
});

it('returns null when the interface has more than one attribute', function () {
    $this->assertNull($this->attributeResolver->resolve(MultipleAttributesContract::class));
});
