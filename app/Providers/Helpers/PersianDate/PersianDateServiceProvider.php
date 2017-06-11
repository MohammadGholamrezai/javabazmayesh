<?php namespace App\Providers\Helpers\PersianDate;

use Illuminate\Support\ServiceProvider;

class PersianDateServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCategoryBuilder();

        $this->app->alias('persianDate', 'App\Providers\Helpers\PersianDate');
    }

    /**
     * Register the Category builder instance.
     *
     * @return void
     */
    protected function registerCategoryBuilder()
    {
        $this->app->singleton('persianDate', function () {
            return new PersianDate();
        });
    }

}
