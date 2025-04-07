<?php

namespace AlgoYounes\Bindify\Contexts;

use AlgoYounes\Bindify\Attributes\BindType;

readonly class BindContext
{
    /** @param array<class-string> $concrete */
    public function __construct(
        private string $abstract,
        private array $concrete,
        private BindType $type,
        private ?string $tag = null,
    ) {}

    /**
     * @param  class-string|array<class-string>  $concrete
     */
    public static function create(string $abstract, string|array $concrete, BindType $type): self
    {
        if (is_string($concrete)) {
            $concrete = [$concrete];
        }

        return new self($abstract, $concrete, $type);
    }

    public function getAbstract(): string
    {
        return $this->abstract;
    }

    /**
     * @return array<class-string>
     */
    public function getConcrete(): array
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

    public function getTag(): string
    {
        if ($this->tag === null) {
            return $this->abstract.'_tag';
        }

        return $this->tag;
    }

    public function hasTag(): bool
    {
        return $this->tag !== null;
    }
}
