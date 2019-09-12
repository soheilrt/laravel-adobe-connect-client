<?php

namespace Soheilrt\AdobeConnectClient;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Psr\SimpleCache\InvalidArgumentException;
use Soheilrt\AdobeConnectClient\Client\Client;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Connection;

class AdobeConnectServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/config/adobeConnect.php", 'adobeConnect');
        $this->bindFacades();
    }

    /**
     * Bind Facades
     *
     * @return void
     */
    private function bindFacades()
    {
        $config = $this->getAdobeConfig();
        $entities = $config["entities"];

        $this->app->singleton(Client::class, function () {
            return $this->processClient();
        });

        $this->app->bind('sco', function () use ($entities) {
            return new $entities["sco"]();
        });
        $this->app->bind('sco-record', function () use ($entities) {
            return new $entities["sco-record"]();
        });
        $this->app->bind('principal', function () use ($entities) {
            return new $entities["principal"]();
        });
        $this->app->bind('permission', function () use ($entities) {
            return new $entities["permission"]();
        });
        $this->app->bind('common-info', function () use ($entities) {
            return new $entities["common-info"]();
        });
        $this->app->bind('adobe-connect', function () {
            return App::make(Client::class);
        });

    }

    /**
     * get Adobe Connect Client Config
     *
     * @return array|null
     */
    private function getAdobeConfig()
    {
        return $this->app["config"]->get("adobeConnect");
    }

    /**
     * login adobe client in case of there is no session configured
     *
     * @throws InvalidArgumentException
     * @return Client
     */
    private function processClient()
    {
        $config = $this->getAdobeConfig();

        $connection = new Connection($config["host"], $config["connection"]);
        $client = new Client($connection);

        if ($config["session-cache"]["enabled"]) {
            $this->loginClient($client);
        }

        return $client;
    }

    /**
     * Login Client Based information that introduced in environment/config file
     *
     * @param Client $client
     *
     * @throws InvalidArgumentException
     * @return void
     */
    private function loginClient(Client $client)
    {
        $config = $this->getAdobeConfig();
        $cacheRepository = Cache::store($this->getCacheDriver());

        // this statement will check for session cache value and sees if there is
        // any valid value(not empty) session available inside cache or not. If there isn't any valid cache it
        // will send a login request and then put client session string inside cache on successful login.
        //on the other side if there is any valid session inside cache, it'll use it for creating client instance
        // instead of sending login request to adobe server
        if ($this->ValidateCache($cacheRepository, $config['session-cache']['key'])) {
            $client->setSession($cacheRepository->get($config["session-cache"]["key"]));
        } else {

            $client->login($config["user-name"], $config["password"]);
            //store client session string if login was successful
            if ($client->getSession()) {
                $cacheRepository->put(
                    $config['session-cache']['key'],
                    $client->getSession(),
                    $config['session-cache']['timeout']
                );
            }
        }
    }

    /**
     * get Preferred cache driver
     *
     * @return string|null
     */
    private function getCacheDriver()
    {
        $config = $this->app["config"]->get("adobeConnect");
        if ($driver = $config["session-cache"]["driver"]) {
            return $driver;
        }
        return $this->app["config"]->get("cache.default");
    }

    /**
     * validate cached session based on it's value
     * tries to remove cache value in case of an empty value stored on cache.
     *
     * @param Repository $driver
     * @param string     $key
     *
     * @throws InvalidArgumentException
     * @return bool
     */
    private function ValidateCache(Repository $driver, string $key)
    {
        $status = empty($driver->get($key));
        if ($status) {
            $driver->forget($key);
        }
        return !$status;
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/adobeConnect.php' => config_path('adobeConnect.php'),
        ], 'adobe-connect');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Client::class,
            'sco-record',
            'principal',
            'permission',
            'common-info',
            'sco',
            'adobe-connect'
        ];
    }
}
