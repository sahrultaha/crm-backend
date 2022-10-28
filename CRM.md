

# CRM

## Requirements:
 - [Docker](https://www.docker.com/) 
 - CRM Backend
 - CRM Frontend

## First Installation
- clone CRM Backend and CRM frontend on the same directory
- cd to CRM Frontend directory
- do `docker run --rm --interactive --tty -w /app --volume $PWD:/app node:16-alpine npm install`
- copy .env.example to .env `cp .env.example .env`
- cd to CRM Backend directory
- do `docker pull composer` 
- do `docker run --rm --interactive --tty --volume $PWD:/app composer install`
- Build the docker container `./vendor/bin/sail build --no-cache`
- copy .env.example to .env `cp .env.example .env`
- Run docker container for the first time `./vendor/bin/sail up -d`
- do `./vendor/bin/sail artisan key:generate`
- do `./vendor/bin/sail artisan migrate --seed`

## Configuration (.env)
Please make sure `ADMIN_EMAIL` and `ADMIN_PASSWORD` is not empty

To use separate environment for dusk please copy `.env` to `.env.dusk.local` and modifies the `DB_DATABASE=testing` value.

## /etc/hosts
Add below lines to your /etc/hosts
    127.0.0.1     crm.test
    127.0.0.1     api.crm.test
    127.0.0.1     www.crm.test

## URLs
- Frontend http://www.crm.test:3000/
- Backend http://api.crm.test/
- Dusk Testing http://localhost:7900

## Running the development server

Refer to documentation of [sail](https://laravel.com/docs/9.x/sail)

- Change directory to the CRM Backend directory
- do `./vendor/bin/sail up`

## Before pull request
- `vendor/bin/sail artisan test`
- `vendor/bin/sail pint --test`
- `vendor/bin/sail dusk`
- `vendor/bin/sail artisan migrate:fresh --seed`

## Docker clean up
- `vendor/bin/sail down`
- `docker rm -f $(docker ps -a -q)`
- `docker volume rm $(docker volume ls -q)`

