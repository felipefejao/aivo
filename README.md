# Aivo - PHP Test


This is my development test to Aivo.

I would like to thank you all by the opportunity.

# Requirements
 - PHP 7.4
 - Composer


# Installation

Clone this repository
```sh
$ git clone https://github.com/felipefejao/aivo.git
$ cd aivo
$ composer install
$ cp .env.example .env
```

Add the line to .env file
```
DEVKEY=AIzaSyBAFF6nPnjRACuU1CiKPI5Ooyiz1Bj9aQE #Google console credential
```

And run this to create the laravel key
```
php artisan key:generate
```

To run the code use de command

```
php artisan serve
```

# Testing

On Postman ou similiar software run the url

```
GET http://localhost:8000/api/youtube?search=[search]
```
