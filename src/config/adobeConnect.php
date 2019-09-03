<?php

use Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo;
use Soheilrt\AdobeConnectClient\Client\Entities\Permission;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Entities\SCORecord;

return [

    /**
     * ---------------------------
     * Adobe Connect Host address
     * ---------------------------
     *
     * Adobe Connect host address which by default set to test.adobeconnect.com/api/xml
     *
     */
    'host'       => env('ADOBE_CONNECT_HOST', 'https://test.adobeconnect.com/api/xml'),

    /**
     * ---------------------------
     * Your Adobe Connect username
     *---------------------------
     *
     * it'll use an empty string in case that ADOBE_CONNECT_USER_NAME environment is not set
     */
    'user-name'  => env('ADOBE_CONNECT_USER_NAME', ''),

    /**
     * ---------------------------
     * Your Adobe Connect username
     *---------------------------
     *
     * it'll use an empty string in case that ADOBE_CONNECT_PASSWORD environment is not set
     */
    'password'   => env('ADOBE_CONNECT_PASSWORD', ''),

    /**
     * ---------------------------
     * Connection Default Settings
     *---------------------------
     *
     * Client Facade Connection Default Values, If any of given values from below removed it'll use default value.
     * Connection Class will use settings by default as below and if you want to change it, you have to pass a second
     * value to the connection class manually
     */
    'connection' => [
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT        => 120,
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
    ],
    /**
     *-----------------------------
     * module entities class
     * ---------------------------
     *
     * you can use your own class instead of default class.
     */
    'entities'   => [
        /**
         *-----------------------------
         * Common info Class
         * ---------------------------
         */
        "common-info" => CommonInfo::class,

        /**
         *-----------------------------
         * Permissions Class
         * ---------------------------
         */
        "permission"  => Permission::class,

        /**
         *-----------------------------
         * Principal Class
         * ---------------------------
         */
        "principal"   => Principal::class,

        /**
         *-----------------------------
         * SCO Class
         * ---------------------------
         */
        'sco'         => SCO::class,

        /**
         *-----------------------------
         * SCO Records Class
         * ---------------------------
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
     * @todo impelement queue
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

