<?php

namespace Soheilrt\AdobeConnectClient\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Soheilrt\AdobeConnectClient\AdobeConnectServiceProvider;


class TestCase extends OrchestraTestCase
{

    /**
     *
     */
    protected function getPackageProviders($app)
    {
        return [
            AdobeConnectServiceProvider::class,
        ];
    }


    /**
     * setup the environment
     *
     * @param Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app["config"]->set("adobeConnect", require __DIR__ . "/../src/config/adobeConnect.php");
        $app["config"]->set('adobeConnect.session-cache.driver','array');

        $app['config']->set('database.default', 'test');
        $app['config']->set('database.connections.test', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
