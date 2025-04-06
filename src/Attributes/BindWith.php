<?php

namespace AlgoYounes\Bindify\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class BindWith
{
    public function __construct(
        public string $concrete,
        public BindType $type = BindType::Transient,
    ) {}

    public function getConcrete(): string
    {
        return $this->concrete;
    }

    public function getType(): BindType
    {
        return $this->type;
    }
}
