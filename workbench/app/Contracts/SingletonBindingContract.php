<?php

namespace Workbench\App\Contracts;

use AlgoYounes\Bindify\Attributes\BindType;
use AlgoYounes\Bindify\Attributes\BindWith;
use Workbench\App\DefaultImplementationContract;

#[BindWith(DefaultImplementationContract::class, BindType::Singleton)]
interface SingletonBindingContract {}
