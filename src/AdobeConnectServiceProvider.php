<?php

namespace Soheilrt\AdobeConnectClient;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Soheilrt\AdobeConnectClient\Client\Client;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Connection;
use Soheilrt\AdobeConnectClient\Facades\CommonInfo;
use Soheilrt\AdobeConnectClient\Facades\Permission;
use Soheilrt\AdobeConnectClient\Facades\Principal;
use Soheilrt\AdobeConnectClient\Facades\SCO;
use Soheilrt\AdobeConnectClient\Facades\SCORecord;

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

    }

    /**
     * Bind Facades
     *
     * @return void
     */
    private function bindFacades()
    {
        $config = $this->app["config"]->get("adobeConnect");
        $entities = $config["entities"];

        $this->app->singleton(Client::class, function () use ($config) {
            $connection = new Connection($config["host"], $config["connection"]);
            $client = new Client($connection);
            $client->login($config["user-name"], $config["password"]);
            return $client;
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
        $this->app->singleton('adobe-connect', function () {
            return App::make(Client::class);
        });

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
        $this->bindFacades();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            SCORecord::class,
            Principal::class,
            Permission::class,
            CommonInfo::class,
            Client::class,
            SCO::class,
            'adobe-connect'
        ];
    }
}
