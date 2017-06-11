<?php namespace App\Providers\Helpers\PersianDate;

use Illuminate\Support\Facades\Facade;

class PersianDateFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'persianDate';
    }

}