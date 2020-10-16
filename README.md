Strukt Audit
===

## Getting Started

Project `strukt/pkg-audit` is a `strukt` module.

### Prerequisite

Install `strukt/strukt` and generate application also use commands below:

```sh
composer create-project strukt/strukt:dev-master --prefer-dist
console generate:app yourappname
```

### Installation

Install and publish `strukt/pkg-audit`:

```sh
composer require strukt/pkg-books
console generate:app nameofyourapp
console publish:package pkg-do
console publish:package pkg-audit
console generate:loader
```

### Migrations

```sh
./console migrate:exec
```

You are now good and ready to go!

