<?php

return [

    /* Front */

    '/module/ikinoa'	=> [
        'use' => 'FrontIkinoaController@index',
        'name' => 'ikinoa.page',
        'template' => '/Page/index',
    ],

    '/module/ikinoa/themes'	=> [
        'use' => 'FrontIkinoaController@theme',
        'name' => 'ikinoa.page.theme',
        'template' => '/Page/theme'
    ]

];