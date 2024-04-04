# CakePHP 4.5.x - reCAPTCHA

## Installation

### Composer

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require ivanamat/cakephp-captcha
```

### Git submodule
```
git submodule add git@github.com:ivanamat/cakephp-captcha.git plugins/Captcha
git submodule init
git submodule update
```
## Getting started

Get reCAPTCHA **secret** at https://www.google.com/recaptcha

## Configure

Set the secret in your `config/bootstrap.php` file.  

```
    Configure::write('Captcha.secret','MY_SECRET_KEY');
```

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

## Easy to use

### Controller
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

### HTML
Paste this snippet before the closing tag `</head>` in the HTML template
```html
    <script src='https://www.google.com/recaptcha/api.js'></script>
```

Paste this snippet at the end of the `<form>` where you want the reCAPTCHA widget to appear. Replace `YOUR-SITEKEY` with your own site key.  
```html
    <div class="g-recaptcha" data-sitekey="YOUR-SITEKEY"></div>
```

## About CakePHP 4.x - reCAPTCHA

CakePHP 4.x - Captcha uses the [reCAPTCHA](https://github.com/google/recaptcha) third-party library.  
You can download [reCAPTCHA](https://github.com/google/recaptcha) from official website: [https://github.com/google/recaptcha)

[Google reCAPTCHA](https://developers.google.com/recaptcha)

## Contributors
Iván Amat on [GitHub](https://github.com/ivanamat) and [www.ivanamat.es](http://www.ivanamat.es/)  
BusaniPrepaid on [GitHub](https://github.com/BusaniPrepaid)
