<?php

namespace Bmatovu\MultiAuth;

use Illuminate\Support\Facades\Facade;

class MultiAuth extends Facade
{

    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'multi-auth';
    }

}