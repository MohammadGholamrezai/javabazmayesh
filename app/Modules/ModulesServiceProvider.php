<?php namespace App\Modules;
 
/**
* ServiceProvider
*
* The service provider for the modules. After being registered
* it will make sure that each of the modules are properly loaded
* i.e. with their routes, views etc.
*
* @author Kamran Ahmed <kamranahmed.se@gmail.com>
* @package App\Modules
*/
class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public function boot()
    {
        // For each of the registered modules, include their routes and Views
        $modules = config("module.modules");
 
        while (list(,$module) = each($modules)) {

            // Load the routes for each of the modules
            if(file_exists(__DIR__.'/'.$module.'/routes.php')) {
                include __DIR__.'/'.$module.'/routes.php';
            }

            // Load the views
            if(is_dir(__DIR__.'/'.$module.'/Views')) {
                $this->loadViewsFrom(__DIR__.'/'.$module.'/Views', $module);
            }
        }
    }

    public function register() {}

    public static function setLocale($prefix){
        $request = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:null;

        if(!$request)
            return false;

        $requestArr = explode("/",$request);
        $locale='';
        foreach($requestArr as $item){
            if($item){
                $locale = $item;
                break;
            }
        }
        if(strlen($locale)==2){
            $prefix = $locale.'/'.$prefix;
        }

        return $prefix;

    }

}
