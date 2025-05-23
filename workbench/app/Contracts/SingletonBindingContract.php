<?php

namespace Workbench\App\Contracts;

use AlgoYounes\Bindify\Attributes\BindType;
use AlgoYounes\Bindify\Attributes\BindWith;
use Workbench\App\DefaultImplementationService;

#[BindWith(DefaultImplementationService::class, BindType::Singleton)]
interface SingletonBindingContract {}
