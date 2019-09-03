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
     * @todo complete phpdoc
     */
    'connection' => [
        //
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

