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

Bindify is a Laravel package that provides a simple way to bind interfaces to their implementations using attributes.

## Installation

You can install the package via composer:

```
composer require algoyounes/bindify
```

After installation, inject the service provider :
    
```php
'providers' => [
    // Other Service Providers
    AlgoYounes\Bindify\BindifyServiceProvider::class,
],
```

## Usage

### 1. Define your interface and implementation : 

Apply the `#[BindWith]` attribute to bind an interface to its implementation.

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

### 2. Create your implementation :

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

### Supported Binding Types : 

- `BindType::Singleton` : Binds the implementation as a singleton.
- `BindType::Transient` : Binds the implementation as a transient.

