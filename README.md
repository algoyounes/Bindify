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

> [!NOTE]
> This package requires PHP 8.2+

## Installation

You can install the package via composer:

```
composer require algoyounes/bindify
```

## Usage

### Basic Binding

Define your interface with the `#[BindWith]` attribute:

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

Create your implementation:

```php
namespace App\Services;

use App\Contracts\ServiceContract;

class DefaultService implements ServiceContract
{
    public function execute()
    {
        // Your implementation
    }
}
```

### Binding Types

| Type                  | Description                         |
|-----------------------|-------------------------------------|
| `BindType::Singleton` | Shares the same instance everywhere |
| `BindType::Transient` | Creates a new instance each time    |

### Advanced Binding

#### Multiple Implementations

Bind multiple implementations to an interface:

```php
namespace App\Contracts;

use AlgoYounes\Bindify\Attributes\BindWith;
use AlgoYounes\Bindify\Attributes\BindType;

#[BindWith([DefaultService::class, AlternativeService::class], BindType::Singleton)]
interface ServiceContract
{
    // ...
}
```

#### Tagged Bindings

Explicitly tag your bindings:

```php
#[BindWith([DefaultService::class], BindType::Singleton, tag: 'primary')]
```

> [!NOTE]
> **When no tag is provided and there are multiple services**, will auto-generates a tag by appending `<class_name>_tag`
>

### Retrieving Bindings

Resolve your bindings as usual through container:

```php
$service = app(ServiceContract::class);

$services = app()->tagged('primary');
```

## Contributing

Thank you for considering contributing to this package! Please check the [CONTRIBUTING](CONTRIBUTING.md) file for more details.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).
