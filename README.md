Strukt Audit
===

## Getting Started

Project `strukt/audit` is a `strukt` module.

### Installation

Install and publish `strukt/audit`:

```sh
composer require strukt/audit
composer exec publish-strukt-do
composer exec config-do
chmod +x console
./console generate:app nameofyourapp
composer exec publish-strukt-audit
./console generate:loader
```

Run migration:

```sh
./console migrate:exec
```

You are now good and ready to go!

