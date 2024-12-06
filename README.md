<p align="center">
<img width="150" height="150" src="assets/logo.png" alt="Bindify Logo"/>
<br><b>Bindify</b>
</p>
<p align="center">
<a href="https://github.com/algoyounes/bindify/actions"><img src="https://github.com/algoyounes/bindify/actions/workflows/unit-tests.yml/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/algoyounes/bindify"><img src="https://img.shields.io/packagist/dt/algoyounes/bindify" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/algoyounes/bindify"><img src="https://img.shields.io/packagist/v/algoyounes/bindify" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/algoyounes/bindify"><img src="https://img.shields.io/packagist/l/algoyounes/bindify" alt="License"></a>
</p>

**Bindify** is a Laravel package that provides a simple way to bind interfaces to their implementations using attributes.

## Installation

You can install the package via composer:

```
composer require algoyounes/bindify
```

After installation, register the service provider in your `config/app.php` file:
    
```php
'providers' => [
    // Other Service Providers
    AlgoYounes\Bindify\BindifyServiceProvider::class,
],
```

## Usage

### Supported Bind Types
- `BindType::Singleton`: Keeps one instance and shares it everywhere.
- `BindType::Transient`: Creates a new instance every time you use it.

### Define your interface and implementation

1. Use the `#[BindWith]` attribute to bind an interface to its implementation

```php

namespace App\Contracts;

use AlgoYounes\Bindify\Attributes\BindWith;
use AlgoYounes\Bindify\Attributes\BindType;

#[BindWith(DefaultService::class, BindType::Singleton)]
interface ServiceContract
{
    public function execute();
}
```

2. Create the implementation of the interface

```php

namespace App\Services;

use App\Contracts\ServiceContract;

class DefaultService implements ServiceContract
{
    public function execute()
    {
        // Your implementation here
    }
}
```
