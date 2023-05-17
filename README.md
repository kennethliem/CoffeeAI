# CoffeeAI - Discover and savor your coffee with ease.

![image](https://user-images.githubusercontent.com/69246482/224530445-6aff5c5b-b5cd-469d-92b8-2bfd4fceda35.png)

## App Description

Our coffee bean detection website is a platform designed to assist coffee enthusiasts in identifying different types of coffee beans. Our team has worked tirelessly to create a website that is both informative and user-friendly. We understand the importance of knowing the exact type of coffee beans used in coffee-making, and have made it our mission to provide accurate and detailed information about each type of coffee bean. Through our website, users can learn about the origins, taste profiles for each type of coffee bean.

### Note

<b>For now, this application can only be used for: </b>

- Arabica Gayo
- Robusta Gayo

<b>In the future we will update so that it can be used for other coffee beans type.</b>

### Homepage Screenshots

![AppScreenshots](https://user-images.githubusercontent.com/69246482/224529673-b68d91b4-c21b-4674-b109-7884e7445f8a.png)

### Admin Dashboard Screenshots

![AdminScreenshot](https://github.com/kennethliem/CoffeeAI/assets/69246482/8f2807db-0fb8-41c9-b7c9-f2f8222fa93f)

### Detection API

- Endpoint : `/api/detection`
- HTTP Method : `POST`
- Request Header :
  - Authorization : `Bearer {token}`
- Request Body :

  - `image` as `file`

- Response Body (Success) :

```
{
    "coffeeType": "Robusta Gayo",
    "error": false,
    "message": "Success"
}
```

- Response Body (Fail) :

```
{
    "coffeeType": null,
    "error": true,
    "message": {error message}
}
```

## Development

#### Requirements

- A Mac or Windows computer.
- PHP 8.0.25 and Composer
- MySQL Database

#### Server Requirements

PHP version 8.0.25 is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

#### Third-party Package

```
CodeIgniter 4 UUID  : https://github.com/michalsn/codeigniter4-uuid
ramsey/uuid         : https://github.com/ramsey/uuid
firebase/php-jwt    : https://github.com/firebase/php-jwt
```

### Clone this App

**Clone**

```bash
$ git clone https://github.com/kennethliem/CoffeeAI.git
```

**Run this project on Local Server**

- `Open Terminal / Command Promt`
- `composer update`
- `php spark migrate`
- `php spark db:seed AppInformation`
- `php spark db:seed AdminUsers`
- `php spark serve`
- `run localhost:8080 on browser`
