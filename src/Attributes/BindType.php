<?php

namespace AlgoYounes\Bindify\Attributes;

enum BindType: string
{
    case Singleton = 'singleton';
    case Transient = 'transient';
}
