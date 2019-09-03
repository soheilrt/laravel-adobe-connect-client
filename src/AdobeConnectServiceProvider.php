<?php

namespace Soheilrt\AdobeConnectClient;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Soheilrt\AdobeConnectClient\Client\Client;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Connection;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Facades\CommonInfo;
use Soheilrt\AdobeConnectClient\Facades\Permission;
use Soheilrt\AdobeConnectClient\Facades\Principal;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfigs();
        $this->bindFacades();
    }

    /**
     * register config files
     *
     * @return null
     */
    private function publishConfigs()
    {
        $this->publishes([
            __DIR__ . '/config/adobeConnect.php' => config_path('adobeConnect.php'),
        ], 'config');
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

        $this->app->bind('SCO', function () use ($entities) {
            return new $entities["sco"]();
        });
        $this->app->bind('SCORecord', function () use ($entities) {
            return new $entities["sco-record"]();
        });
        $this->app->bind('Principal', function () use ($entities) {
            return new $entities["principal"]();
        });
        $this->app->bind('Permission', function () use ($entities) {
            return new $entities["permission"]();
        });
        $this->app->bind('CommonInfo', function () use ($entities) {
            return new $entities["common-info"]();
        });
        $this->app->singleton('AdobeClient', function () use ($config) {
            $connection = new Connection($config["host"], $config["connection"]);
            $client = new Client($connection);
            $client->login($config["user-name"], $config["password"]);
            return $client;
        });
    }

    /**
     * {@inheritDoc}
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
        ];
    }
}
