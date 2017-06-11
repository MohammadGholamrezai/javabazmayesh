<?php

namespace App\Providers;

use App\Language;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->singleton('locale', function () {
            if (strlen(Request::segment(1)) > 2) {
                return '';
            } else {
                return Request::segment(1);
            }
        });

        $this->app->singleton('getPrefix', function (Request $request) {
            $locale = $request->segment(1);

            if (strlen($locale) > 2) {
                return $locale;
            } else {
                $locale = $request->segment(2);
                return $locale;
            }
        });

        $this->app->singleton('getLocale', function () {
            return app('locale') == '' ? Config::get('app.fallback_locale') : app('locale');
        });

        $this->app->singleton('getLocaleDefault', function () {
            return Config::get('app.fallback_locale');
        });

        $this->app->singleton('activeLangDetails', function () {
            $language = new Language();
            return $language->getLanguage(app('getLocale'));
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return base_path().env('PUBLIC_PATH_URL', 'public');
        });
    }
}
