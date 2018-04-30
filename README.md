# Viacoin JSON-RPC Service Provider for Laravel

## About
This package allows you to make JSON-RPC calls to Viacoin Core JSON-RPC server from your laravel project.
It's based on [php-viacoinrpc](https://github.com/onurrr/php-viacoinrpc) project - fully unit-tested Viacoin JSON-RPC client powered by GuzzleHttp.

## Installation
Run ```php composer.phar require onurrr/laravel-viacoinrpc``` in your project directory or add following lines to composer.json
```json
"require": {
    "onurrr/laravel-viacoinrpc": "^1.1"
}
```
and run ```php composer.phar update```.

Add `Onurrr\Viacoin\Providers\ServiceProvider::class,` line to the providers list somewhere near the bottom of your /config/app.php file.
```php
'providers' => [
    ...
    Onurrr\Viacoin\Providers\ServiceProvider::class,
];
```

Publish config file by running
`php artisan vendor:publish --provider="Onurrr\Viacoin\Providers\ServiceProvider"` in your project directory.

You might also want to add facade to $aliases array in /config/app.php.
```php
'aliases' => [
    ...
    'Viacoind' => Onurrr\Viacoin\Facades\Viacoind::class,
];
```

I recommend you to use .env file to configure client.
To connect to Viacoin Core you'll need to add at least following parameters
```
VIACOIND_USER=(rpcuser from viacoin.conf)
VIACOIND_PASSWORD=(rpcpassword from viacoin.conf)
```

## Requirements
* PHP 7.0 or higher (should also work on 5.6, but this is unsupported)
* Laravel 5.1 or higher

## Usage
You can perform request to Viacoin Core using any of methods listed below:
### Helper Function
```php
<?php

namespace App\Http\Controllers;

class ViacoinController extends Controller
{
  /**
   * Get block info.
   *
   * @return object
   */
   public function blockInfo()
   {
      $blockHash = 'dd5076b0d5da723580f906a8711b757b953f97dcaf6a8422420fea92f47dbfee';
      $blockInfo = viacoind()->getBlock($blockHash);
      return response()->json($blockInfo->get());
   }
}
```

### Facade
```php
<?php

namespace App\Http\Controllers;

use Viacoind;

class ViacoinController extends Controller
{
  /**
   * Get block info.
   *
   * @return object
   */
   public function blockInfo()
   {
      $blockHash = 'dd5076b0d5da723580f906a8711b757b953f97dcaf6a8422420fea92f47dbfee';
      $blockInfo = Viacoind::getBlock($blockHash);
      return response()->json($blockInfo->get());
   }
}
```

### Automatic Injection
```php
<?php

namespace App\Http\Controllers;

use Onurrr\Viacoin\Client as ViacoinClient;

class ViacoinController extends Controller
{
  /**
   * Get block info.
   *
   * @param  ViacoinClient  $viacoind
   * @return \Illuminate\Http\JsonResponse
   */
   public function blockInfo(ViacoinClient $viacoind)
   {
      $blockHash = 'dd5076b0d5da723580f906a8711b757b953f97dcaf6a8422420fea92f47dbfee';
      $blockInfo = $viacoind->getBlock($blockHash);
      return response()->json($blockInfo->get());
   }
}
```

## License

This product is distributed under MIT license.

## Donations

If you like this project,
you can donate Bitcoins to 3L6dqSBNgdpZan78KJtzoXEk9DN3sgEQJu.

Thanks for your support!❤
