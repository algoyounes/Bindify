<?php

namespace AlgoYounes\Bindify\Contexts;

use AlgoYounes\Bindify\Attributes\BindType;

readonly class BindContext
{
    public function __construct(
        private string $abstract,
        private string $concrete,
        private BindType $type,
    ) {}

    public static function create(string $abstract, string $concrete, BindType $type): self
    {
        return new self($abstract, $concrete, $type);
    }

    public function getAbstract(): string
    {
        return $this->abstract;
    }

    public function getConcrete(): string
    {
        return $this->concrete;
    }

    public function getType(): BindType
    {
        return $this->type;
    }

    public function isSingleton(): bool
    {
        return $this->type === BindType::Singleton;
    }
}
