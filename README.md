Strukt Audit
===

## Getting Started

Project `strukt/audit` is a `strukt` module.

### Prerequisite

You will require to install `strukt/strukt` via [strukt-strukt](https://github.com/pitsolu/strukt-strukt). Then install module `strukt/do` via [strukt-do](https://github.com/pitsolu/strukt-do)

### Installation

Install and publish `strukt/audit`:

```sh
composer require strukt/audit
composer exec publish-strukt-audit
```

Run migration:

```sh
./console migrate:exec
```

Use namespace:

```php
use App\Middleware\Audit as AuditMiddleware;
```

Add middleware via router kernel:

```php
$kernel->middlewares(array(
...
...
...
	AuditMiddleware::class,
	RouterMiddleware::class
));
```

You are now good and ready to go!

