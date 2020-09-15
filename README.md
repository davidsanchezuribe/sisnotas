# SISNOTAS


## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
What things you need to install the software.

* Git.
* PHP.
* Composer.
* Laravel CLI.
* A webserver or Apache.

### Install
Clone the git repository on your computer
```
$ git clone https://github.com/davidsanchezuribe/sisnotas.git
```

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies. 
```
$ cd sisnotas
$ composer install
```

### Setup (Opcional) - Create an .env
When you are done with installation, copy the `.env.example` file to `.env`
```
$ cp  .env.example .env
```

Generate the application key
```
$ php artisan key:generate
```

Add your database credentials to the necessary `env` fields

Migrate the application
```
$ php artisan migrate & php artisan migrate:refresh --seed
```

### Run the application
```
$ php artisan serve
```

### Basic Coding Standard
* [PSR-coding-standard](https://github.com/davidsanchezuribe/sisnotas/blob/master/accepted/PSR-coding-standard.md) - Programming style guide

## Built With
* [Laravel](https://laravel.com) - The PHP framework for building the API endpoints needed for the application

