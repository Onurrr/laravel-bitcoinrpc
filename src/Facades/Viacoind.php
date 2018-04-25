<?php

namespace Onurrr\Viacoin\Facades;

use Illuminate\Support\Facades\Facade;

class Viacoind extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'viacoind';
    }
}
