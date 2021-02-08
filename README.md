## Installation

```bash
composer install
```

## Running

App can be run with [Sail](https://laravel.com/docs/8.x/sail).

Copy env for Sail:
```bash
cp .env.sail .env
```

Run dev server
```bash
./vendor/bin/sail up
```

Run migrations and test seed data
```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

Visit: http://localhost/

## Test data
Test email: `azamat@test.com`<br> 
Pass: `password`

or register here: http://localhost/register

## Unit test

```bash
./vendor/bin/sail artisan test
```
