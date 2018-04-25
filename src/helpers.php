<?php

if (! function_exists('viacoind')) {
    /**
     * Get viacoind client instance.
     *
     * @return \Onurrr\Viacoin\Client
     */
    function viacoind()
    {
        return app('viacoind');
    }
}
