<?php

namespace Workbench\App;

use Workbench\App\Contracts\DefaultBindTypeContract;
use Workbench\App\Contracts\SingletonBindingContract;

class DefaultImplementationContract implements DefaultBindTypeContract, SingletonBindingContract {}
