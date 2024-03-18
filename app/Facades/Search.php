<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Search extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'search';
    }
}