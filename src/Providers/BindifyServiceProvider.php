<?php

namespace AlgoYounes\Bindify\Providers;

use AlgoYounes\Bindify\Contexts\BindContext;
use AlgoYounes\Bindify\Contracts\BindifyResolver;
use AlgoYounes\Bindify\Resolvers\AttributeResolver;
use Closure;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class BindifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BindifyResolver::class, AttributeResolver::class);

        $this->app->beforeResolving($this->beforeResolvingCallback());
    }

    private function beforeResolvingCallback(): Closure
    {
        return static function (string $abstract, array $parameters, Container $container): void {
            if ($container->bound($abstract) === true) {
                return;
            }

            $attributeResolver = $container->make(BindifyResolver::class);
            if (! $attributeResolver instanceof BindifyResolver) {
                return;
            }

            $binding = $attributeResolver->resolve($abstract);
            if (! $binding instanceof BindContext) {
                return;
            }

            foreach ($binding->getConcrete() as $concrete) {
                $container->bind(
                    $binding->getAbstract(),
                    $concrete,
                    $binding->isSingleton(),
                );
            }
        };
    }
}
