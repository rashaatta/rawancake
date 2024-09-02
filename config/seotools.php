<?php

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            // 'title'        => config('app.name'), // set false to total remove
            'title'        => 'روان كيك', // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => false, // set false to total remove
            'separator'    => ' | ',
            'keywords'     => [],
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => config('app.name'), // set false to total remove
            'description' => false, // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => config('app.name'),
            'images'      => [
                'https://rawan.jo-life.com/assets/img/logo_small.png'
            ],
            'locale' => 'ar_SA',

        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            // 'site'        => '@kafiildotcom',
            // 'creator'        => '@kafiildotcom',
            'image'      => 'https://rawan.jo-life.com/assets/img/logo_small.png',
            'image:src'      => 'https://rawan.jo-life.com/assets/img/logo_small.png',

        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => false, // set false to total remove
            'description' => false, // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [
                'https://rawan.jo-life.com/assets/img/logo_small.png'
            ],

        ],
    ],
];
