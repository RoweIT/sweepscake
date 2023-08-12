
# Rowe GBBO Sweepscake application

## Before you start

The application can be developed and built on Windows, Linux or MacOS.

These technologies are required to run the application along with the minimum
version required. They can be installed within a Docker containerised
environment, or alternatively on the host machine directly.

* PHP - 8.1
* Composer - 2.1.11
* PostgreSQL - 14.1
* NodeJS - 16.13.2
* Suitable IDE

The project is written in PHP and was developed using both PHP Storm and
Visual Studio Code as IDEs.

## How to configure and deploy the project

**Important: Do not commit the contents of the .env file to version control -
it often contains account credentials and other sensitive information**

Start by cloning the app from the git repository.

### App Configuration

The app must be configured by creating a .env file at the root of the project.
There is an example file `.env.example` at the root of the project which can
be copied, renamed, and tweaked. 

This following environment variables should be set:

| Environment Variable      | Type   | Description                                  |
|---------------------------|--------|----------------------------------------------|
| DB_CONNECTION             | String | Type of database, likely `pgsql`             |
| DB_HOST                   | String | Hostname, likely `localhost`                 |
| DB_PORT                   | int    | Database port number                         |
| DB_DATABASE               | String | Database name                                |
| DB_USERNAME               | String | Database user username                       |
| DB_PASSWORD               | String | Database user password                       |
| DB_SCHEMA                 | String | Schema name                                  |
|                           |        |                                              |
| MAIL_MAILER               | String |                                              |
| MAIL_HOST                 | String | Hostname, likely `localhost`                 |
| MAIL_PORT                 | String | Mail server port                             |
| MAIL_USERNAME             | String | Mail server username                         |
| MAIL_PASSWORD             | String | Mail server username                         |
| MAIL_ENCRYPTION           | String |                                              |
| MAIL_FROM_ADDRESS         | String | Email address to use as sender email         |
| MAIL_FROM_NAME            | String | From name to use in sender email             |
|                           |        |                                              |
| SEEDER_ADMIN_PASSWORD     | String |                                              |
| SEEDER_USER_PASSWORD      | String |                                              |
| SEEDER_USERS_EMAIL_DOMAIN | String |                                              |
| SEEDER_USERS_2021         | String | Comma separated list mapping users to bakers |
| SEEDER_USERS_2022_1       | String | Comma separated list mapping users to bakers |
| SEEDER_USERS_2022_2       | String | Comma separated list mapping users to bakers |
|                           |        |                                              |

### Database Migrations

To run the database migrations, enter the following command in the terminal.
Run this command every time changes to the migrations are made.

`php artisan migrate`

To view the currently applied migrations, run:

`php artisan migrate:status`


### Compiling CSS and Javascript

Installing the JavaScript dependencies:

`npm install`

The app stylesheets and javascript needs to be compiled when the app is first
run, every time a new branch is checked out, or a styling change is made.

If stylesheets/javascript are not being changed then they can be compiled once
without recompiling every time a change is made:

`npm run build`

However, if styles or javascript are being tweaked, the following can be run to
recompile every time a change is made:

`npm run dev` 

If for any reason the content cannot be served on another port using the dev
command above, for example the content security policy getting in the way, the
following command can be run to recompile the assets evert time a change is
made.

`npm run watch` Note: This is much slower to run compared to the above command.

For production environments, to create a compressed app.css file, use this:

`npm run prod`

When using PHP Storm IDE this can be configured as a Run Configuration. 


### Running the App Locally

To run the app locally run the following command at the project route in the
terminal.

`php artisan serve`

When using PHP Storm IDE this can be configured as a Run Configuration.

If run with default settings then this will be accessible on

http://localhost:8000/

### Local PostGIS database

Running postgres using a docker container:

```shell
docker run --name postgres -i -t -e POSTGRES_PASSWORD=<password> -p 5432:5432 postgres
```

### Local email server

The application makes use of emails for user registration, password reset and
notification. As such is it convenient in a local development environment to
have a development SMTP server running. smtp4dev (see
https://github.com/rnwood/smtp4dev) works well.

Running smtp4dev using a docker container:

```shell
docker run -p 3000:80 -p 25:25 -d --name smtp4dev rnwood/smtp4dev
```
