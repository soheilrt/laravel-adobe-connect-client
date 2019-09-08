# Laravel Adobe Connect Client 

## Requirements
* PHP 7.2 and above
* Adobe Connect API >= V9.4.5
* Laravel v5.8 OR v6.0

This package is an extended version of [AdobeConnectClient](https://github.com/soheilrt/AdobeConnectClient) for laravel applications.

## Installation
you can install this package through [packagist](https://packagist.org/packages/soheilrt/laravel-adobe-connect-client)
```bash
composer require soheilrt/laravel-adobe-connect-client
```
set following variables inside your `.env` file
```bash
ADOBE_CONNECT_HOST #your account host url address with http:// OR https:// prefix
ADOBE_CONNECT_USER_NAME #your adobe connect account username
ADOBE_CONNECT_PASSWORD #your adobe connect account password
``` 
and you're all set.

## Cache
Laravel Adobe Connect Client Use Laravel Caching system in order to keep current session and use it in further requests.

Note: by default this package use your application default cache setting.

You can this configuration by setting `ADOBE_CONNECT_CACHE_DRIVER` variable inside your `.env` file

More Cache Settings are available inside package's config file.

## Vendor files
 ```bash
php artisan vendor:publish --tag=adobe-connect
 ```
you can find new config file added to your applications config directory named `adobeConnect.php`.

## Usage
Laravel Adobe connect use facades and that means you can use facade class in order to execute your commands.
  
```php
use Soheilrt\AdobeConnectClient\Facades\Client;

$commonInfo=Client::commonInfo();
```

or you can use it as your controller's method injection. e.g:
```php
use App\Http\Controllers\Controller;
use Soheilrt\AdobeConnectClient\Client\Client;

class SampleController Extends Controller
{
    /**
     * auto inject Adobe Connect Client Class example
     *
     * @param Client $client
    */
    public function index(Client $client)
    {
        $commonInfo=$client->commonInfo();
    }
}
``` 
Since this package inspired from [brunogasparetto's](https://github.com/brunogasparetto/AdobeConnectClient) package
you can see more functions and abilities of this package [here](https://brunogasparetto.github.io/AdobeConnectClient/).

If you found any issues or have any questions about the package usage, feel free to contact me on [soheilrt314@gmail.com](mailto://soheilrt314@gmail.com).  
