<?php

use AlgoYounes\Bindify\Attributes\BindType;
use AlgoYounes\Bindify\Contexts\BindContext;
use Workbench\App\AlternativeImplementationService;
use Workbench\App\Contracts\DefaultBindTypeContract;
use Workbench\App\Contracts\InvalidClassBindingsContract;
use Workbench\App\Contracts\MultiBindContract;
use Workbench\App\Contracts\MultipleAttributesContract;
use Workbench\App\Contracts\NoAttributeContract;
use Workbench\App\Contracts\SingletonBindingContract;
use Workbench\App\DefaultImplementationService;

it('returns a binding from the interface attribute with the default type', function () {
    $context = BindContext::create(
        DefaultBindTypeContract::class,
        DefaultImplementationService::class,
        BindType::Transient
    );

    $resolve = $this->attributeResolver->resolve(DefaultBindTypeContract::class);

    $this->assertEquals($context, $resolve);
});

it('returns a binding from the interface attribute with the singleton type', function () {
    $context = BindContext::create(
        SingletonBindingContract::class,
        DefaultImplementationService::class,
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

it('return null when invalid classes binding', function () {
    $this->assertNull($this->attributeResolver->resolve(InvalidClassBindingsContract::class));
});
it('binds multiple valid services to the same interface', function () {
    app(MultiBindContract::class);

    $instances = $this->app->tagged('custom_tag');

    foreach ($instances as $instance) {
        expect(get_class($instance))
            ->toBeIn([DefaultImplementationService::class, AlternativeImplementationService::class]);
    }
});
