# Changelog

All notable changes to `Bindify` will be documented in this file

## v1.1.0 - 2025-04-07

### What's Changed

* Feat: Add multiple service binding support by @algoyounes in https://github.com/algoyounes/Bindify/pull/1

**Full Changelog**: https://github.com/algoyounes/Bindify/compare/v1.0.4...v1.1.0

## v1.0.4 - 2025-04-05

**Full Changelog**: https://github.com/algoyounes/Bindify/compare/v1.0.3...v1.0.4

## v1.0.3 - 2025-04-05

### Changes :

* chore: add `.gitattributes` rules to ignore unnecessary files
* chore: ignore composer.lock

**Full Changelog**: https://github.com/algoyounes/Bindify/compare/v1.0.2...v1.0.3

## v1.0.1 - 2024-12-26

**Full Changelog**: https://github.com/algoyounes/Bindify/compare/v1.0.0...v1.0.1

- Auto-discovery service provider

## v1.0.0 - 2024-12-05

### 🚀 Features

- **Attribute-Based Binding**: Bind interfaces to implementations using the powerful `#[BindWith]` attribute.
  
- **Binding Types**:
  
  - `BindType::Singleton` – Ensure a single instance is shared throughout your application.
  - `BindType::Transient` – Create new instances each time the binding is resolved.
  
- **Automatic Discovery**: Bindify automatically registers and resolves bindings during the application lifecycle.
  
- **Declarative Design**: Simplify dependency management with clean, readable code.
  

### 

**Full Changelog**: https://github.com/algoyounes/Bindify/commits/v1.0.0
