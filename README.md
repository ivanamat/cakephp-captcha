# CakePHP 3.x - reCAPTCHA

## Installation

### Composer

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require ivanamat/cakephp3-captcha
```

### Git submodule
```
git submodule add git@github.com:ivanamat/cakephp3-captcha.git plugins/Captcha
git submodule init
git submodule update
```
## Getting started

Get reCAPTCHA **secret** at https://www.google.com/recaptcha

## Load Component

Load component in the `initialize()` function

```php
    class MyController extends AppController {

        public function initialize() {
            parent::initialize();

            $this->loadComponent('Captcha.Captcha');
        }

    }
```

...or load the component in the `array of components`.

```php
    class MyController extends AppController {

        public $components = [
            'Captcha' => [
                'className' => 'Captcha.Captcha'
            ]
        ];

    }
```

## Configure

Set the secret in your `config/bootstrap.php` file.  

```
    Configure::write('Captcha.secret','MY_SECRET_KEY');
```

## Easy to use

```php
    # MyController

    $ip = getenv('REMOTE_ADDR');
    $gRecaptchaResponse = $this->request->data['g-recaptcha-response'];

    $captcha = $this->Captcha->check($ip,$gRecaptchaResponse);

    if($captcha->errorCodes == null) {
        // Success
    } else {
        // Fail! Maybe a bot?
    }
```

## About CakePHP 3.x - reCAPTCHA

CakePHP 3.x - Captcha uses the [reCAPTCHA](https://github.com/google/recaptcha) third-party library.  
You can download [reCAPTCHA](https://github.com/google/recaptcha) from official website: [https://github.com/google/recaptcha).


## Author

Iván Amat on [GitHub](https://github.com/ivanamat)  
[www.ivanamat.es](http://www.ivanamat.es/)
