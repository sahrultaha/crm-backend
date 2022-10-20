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

## Running the development server

Refer to documentation of [sail](https://laravel.com/docs/9.x/sail)

- Change directory to the CRM Backend directory
- do `./vendor/bin/sail up`

## Database configuration
Default database is postgresql, the configuration should be inside .env file.

## Docker clean up
- `vendor/bin/sail down`
- `docker rm -f $(docker ps -a -q)`
- `docker volume rm $(docker volume ls -q)`


