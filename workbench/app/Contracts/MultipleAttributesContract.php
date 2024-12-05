<?php

namespace Workbench\App\Contracts;

use AlgoYounes\Bindify\Attributes\BindWith;
use Workbench\App\DefaultImplementationContract;

#[BindWith(DefaultImplementationContract::class)]
#[BindWith(DefaultImplementationContract::class)]
interface MultipleAttributesContract {}
