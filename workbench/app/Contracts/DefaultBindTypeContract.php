<?php

namespace Workbench\App\Contracts;

use AlgoYounes\Bindify\Attributes\BindWith;
use Workbench\App\DefaultImplementationService;

#[BindWith(DefaultImplementationService::class)]
interface DefaultBindTypeContract {}
