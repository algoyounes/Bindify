<?php

namespace Workbench\App\Contracts;

use AlgoYounes\Bindify\Attributes\BindType;
use AlgoYounes\Bindify\Attributes\BindWith;
use Workbench\App\AlternativeImplementationService;
use Workbench\App\DefaultImplementationService;

#[BindWith([
    DefaultImplementationService::class,
    AlternativeImplementationService::class,
], BindType::Transient, tag: 'custom_tag')]
interface MultiBindContract {}
