<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Viacoind JSON-RPC Scheme
    |--------------------------------------------------------------------------
    | URI scheme of Viacoin Core's JSON-RPC server.
    |
    | Use https to enable SSL connections with Core,
    | but this is strongly discouraged by developers.
    |
    */

    'scheme' => env('VIACOIND_SCHEME', 'http'),

    /*
    |--------------------------------------------------------------------------
    | Viacoind JSON-RPC Host
    |--------------------------------------------------------------------------
    | Tells service provider which hostname or IP address
    | Viacoin Core is running at.
    |
    | If Viacoin Core is running on the same PC as
    | laravel project use localhost or 127.0.0.1.
    |
    | If you're running Viacoin Core on the different PC,
    | you may also need to add rpcallowip=<server-ip-here> to your viacoin.conf
    | file to allow connections from your laravel client.
    |
    */

    'host' => env('VIACOIND_HOST', 'localhost'),

    /*
    |--------------------------------------------------------------------------
    | Viacoind JSON-RPC Port
    |--------------------------------------------------------------------------
    | The port at which Viacoin Core is listening for JSON-RPC connections.
    | Default is 8332 for mainnet and 18332 for testnet.
    | You can also directly specify port by adding rpcport=<port>
    | to viacoin.conf file.
    |
    */

    'port' => env('VIACOIND_PORT', 8332),

    /*
    |--------------------------------------------------------------------------
    | Viacoind JSON-RPC User
    |--------------------------------------------------------------------------
    | Username needs to be set exactly as in viacoin.conf file
    | rpcuser=<username>.
    |
    */

    'user' => env('VIACOIND_USER', ''),

    /*
    |--------------------------------------------------------------------------
    | Viacoind JSON-RPC Password
    |--------------------------------------------------------------------------
    | Password needs to be set exactly as in viacoin.conf file
    | rpcpassword=<password>.
    |
    */

    'password' => env('VIACOIND_PASSWORD', ''),

    /*
    |--------------------------------------------------------------------------
    | Viacoind JSON-RPC Server CA
    |--------------------------------------------------------------------------
    | If you're using SSL (https) to connect to your Viacoin Core
    | you can specify custom ca package to verify against.
    | Note that using Viacoin JSON-RPC over SSL is strongly discouraged.
    |
    */

    'ca' => null,
];
