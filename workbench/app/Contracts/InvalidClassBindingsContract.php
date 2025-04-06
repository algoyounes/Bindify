<?php

namespace Workbench\App\Contracts;

use AlgoYounes\Bindify\Attributes\BindType;
use AlgoYounes\Bindify\Attributes\BindWith;
use Workbench\App\DefaultImplementationService;

#[BindWith(['test1', 'test2', DefaultImplementationService::class], BindType::Singleton)]
interface InvalidClassBindingsContract {}
