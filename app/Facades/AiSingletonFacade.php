<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @see \App\Services\AiSingleton
 */
class AiSingletonFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ai-singleton';
    }
}
