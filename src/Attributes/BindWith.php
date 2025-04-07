<?php

namespace AlgoYounes\Bindify\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class BindWith
{
    /** @param class-string|array<class-string> $concrete */
    public function __construct(
        public string|array $concrete,
        public BindType $type = BindType::Transient,
        public ?string $tag = null,
    ) {}

    /**
     * @return array<class-string>
     */
    public function getConcrete(): array
    {
        if (is_string($this->concrete)) {
            return [$this->concrete];
        }

        return $this->concrete;
    }

    public function getType(): BindType
    {
        return $this->type;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }
}
