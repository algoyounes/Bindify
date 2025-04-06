<?php

namespace Workbench\App;

use Workbench\App\Contracts\DefaultBindTypeContract;
use Workbench\App\Contracts\MultiBindContract;
use Workbench\App\Contracts\SingletonBindingContract;

class DefaultImplementationService implements DefaultBindTypeContract, MultiBindContract, SingletonBindingContract {}
