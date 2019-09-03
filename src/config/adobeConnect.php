<?php

use Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo;
use Soheilrt\AdobeConnectClient\Client\Entities\Permission;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Entities\SCORecord;

return [

    /**
     * @todo complete phpdoc
     */
    'host'       => env('ADOBE_CONNECT_HOST', 'https://test.adobeconnect.com/api/xml'),

    /**
     * @todo complete phpdoc
     */
    'user-name'  => env('ADOBE_CONNECT_USER_NAME', ''),

    /**
     * @todo complete phpdoc
     */
    'password'   => env('ADOBE_CONNECT_PASSWORD', ''),

    /**
     * @todo complete phpdoc
     */
    'connection' => [
        //
    ],
    /**
     *-----------------------------
     * module entities class
     * ---------------------------
     * @todo compelete comments
     */
    'entities'   => [
        /**
         * @todo complete phpdoc
         */
        "common-info" => CommonInfo::class,

        /**
         * @todo complete phpdoc
         */
        "permission"  => Permission::class,

        /**
         * @todo complete phpdoc
         */
        "principal"   => Principal::class,

        /**
         * @todo complete phpdoc
         */
        'sco'         => SCO::class,

        /**
         * @todo complete phpdoc
         */
        'sco-record'  => SCORecord::class,
    ],


    /*
     * -------------------------------------
     * Adobe Connect Queue Driver Settings
     * -------------------------------------
     *
     * laravel's adobe connect supports queues for running tasks in order to 
     * improve application performance
     * 
     * 
     */
    "queue"      => [
        /**
         * ----------------------------------
         * adobe connect default queue driver
         * ----------------------------------
         *
         * package will use application default queue driver if ADOBE_CONNECT_QUEUE_DRIVER is not present in
         * application's env file
         */
        "default" => env("ADOBE_CONNECT_QUEUE_DRIVER", "default"),
    ],

];

