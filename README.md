# AzPays Laravel Package

[![Latest Stable Version](http://poser.pugx.org/azpays/laravel/v)](https://packagist.org/packages/azpays/laravel) [![Total Downloads](http://poser.pugx.org/azpays/laravel/downloads)](https://packagist.org/packages/azpays/laravel) [![Latest Unstable Version](http://poser.pugx.org/azpays/laravel/v/unstable)](https://packagist.org/packages/azpays/laravel) [![License](http://poser.pugx.org/azpays/laravel/license)](https://packagist.org/packages/azpays/laravel) [![PHP Version Require](http://poser.pugx.org/azpays/laravel/require/php)](https://packagist.org/packages/azpays/laravel)

The official repository of AzPays for Laravel

## Content Table
- [AzPays Laravel Package](#azpays-laravel-package)
  - [Content Table](#content-table)
  - [Installation](#installation)
  - [Usage](#usage)
      - [Configuration](#configuration)
          - [Sandbox Mode](#sandbox-mode)
          - [Debug Mode](#debug-mode)
          - [API](#api)
              - [API URL](#api-url)
              - [Sandbox API URL](#sandbox-api-url)
              - [API Key](#api-key)
              - [API Version](#api-version)
          - [Routes](#routes)
              - [Routes Enabled](#routes-enabled)
              - [Routes Prefix](#routes-prefix)
          - [Merchant](#merchant)
              - [Key](#key)
      - [Payment Create](#payment-create)
      - [Payment Checkout](#payment-checkout)
      - [Payment Check](#payment-check)
      - [Wallet Claim](#wallet-claim)
  - [Security](#security)

## Installation

You can install the package via composer:

```bash
composer require azpays/laravel
```

## Usage

### Configuration

```bash
php artisan vendor:publish --provider="AzPays\Laravel\AzPaysServiceProvider"
```

#### Sandbox Mode
The sandbox mode is used to test the AzPays API. You can set your sandbox mode in the config file called `config/azpays.php` or add key in your `.env` file as follows.
```bash
AZPAYS_SANDBOX_MODE=true
```

#### Debug Mode
The debug mode is used to debug the AzPays API. You can set your debug mode in the config file called `config/azpays.php` or add change your `APP_DEBUG` value in your `.env` file.

#### API
##### API URL
The API URL is used to set the AzPays API URL. You can set your API URL in the config file called `config/azpays.php` or add key in your `.env` file as follows.
```bash
AZPAYS_API_URL=https://azpays.net/api
```
##### Sandbox API URL
The sandbox API URL is used to set the AzPays sandbox API URL. You can set your sandbox API URL in the config file called `config/azpays.php` or add key in your `.env` file as follows.
```bash
AZPAYS_SANDBOX_API_URL=https://sandbox.azpays.net/api
```
##### API Key
The API key is used to authenticate the AzPays API. The API key is generated from the AzPays dashboard.
You can set your API key in the config file called `config/azpays.php` or add key in your `.env` file as follows.
```bash
AZPAYS_API_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```
##### API Version
The API version is used to set the AzPays API version. You can set your API version in the config file called `config/azpays.php` or add key in your `.env` file as follows.
```bash
AZPAYS_API_VERSION=v1
```

#### Routes
##### Routes Enabled
The routes enabled is used to enable the AzPays routes. You can set your routes enabled in the config file called `config/azpays.php` or add key in your `.env` file as follows.
```bash
AZPAYS_ROUTES_ENABLED=true
```

##### Routes Prefix
The routes prefix is used to set the AzPays routes prefix. You can set your routes prefix in the config file called `config/azpays.php` or add key in your `.env` file as follows.
```bash
AZPAYS_ROUTES_PREFIX=azpays
```

#### Merchant
The merchant key is used to authenticate the merchant. The merchant key is generated from the AzPays dashboard.

##### Key
You can set your merchant key in the config file called `config/azpays.php` or add key in your `.env` file as follows.
```bash
AZPAYS_MERCHANT_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

### Payment Create
This method is used to create a payment request. The payment request is created with the following parameters.
- `amount` (string) - The amount to be paid in **USD** (Fiat Amount).

To create a payment request, you can use the following code.
```php
dispatch_sync(new \AzPays\Laravel\Jobs\CreatePaymentJob('100'));
```

### Payment Checkout
This method is used to checkout a payment request. The payment request is checked out with the following parameters.
- `token` (string) - The payment token that given as unique reference in payment create method.

To checkout a payment request, you can use the following code.
```php
dispatch_sync(new \AzPays\Laravel\Jobs\CheckoutPaymentJob('PAYMENT_TOKEN'));
```

### Payment Check
This method is used to check a payment request. The payment request is checked with the following parameters.
- `token` (string) - The payment token that given as unique reference in payment create method.

To check a payment request, you can use the following code.
```php
dispatch_sync(new \AzPays\Laravel\Jobs\CheckPaymentJob('PAYMENT_TOKEN'));
```

### Wallet Claim
This method is used to claim a wallet. The wallet is claimed with the following parameters.
- `currency` (int) - The currency universal code that given as unique reference in `Enums\Wallet\Currency`.
- `amount` (string) - The amount to be claimed in **USD** (Fiat Amount).
- `payment` (string) - The payment token that given as unique reference in payment create method.

To claim a wallet, you can use the following code.
```php
dispatch_sync(new \AzPays\Laravel\Jobs\ClaimWalletJob(10001, '100', 'PAYMENT_TOKEN'));
```

## Security
If you discover any security related issues, please email [security@azpays.net](mailto:security@azpays.net) instead of using the issue tracker.