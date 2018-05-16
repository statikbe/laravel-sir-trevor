<?php

namespace Statikbe\LaravelSirTrevor;

use Illuminate\Support\Facades\Facade;

class SirTrevorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sir-trevor';
    }
}