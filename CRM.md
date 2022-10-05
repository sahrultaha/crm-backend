# CRM

## Requirements:
 - [Docker](https://www.docker.com/) 
 - CRM Backend
 - CRM Frontend

## First Installation
- clone CRM Backend and CRM frontend on the same directory
- cd to CRM Backend directory
- do `docker pull composer` 
- do `docker run --rm --interactive --tty --volume $PWD:/app composer install`

## Running the development server

Refer to documentation of [sail](https://laravel.com/docs/9.x/sail)

- cd to the CRM Backend directory
- do `./vendor/bin/sail up` or `./vendor/bin/sail up -d` 

