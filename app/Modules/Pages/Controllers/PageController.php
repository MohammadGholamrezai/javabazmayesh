<?php namespace App\Modules\Pages\Controllers;

use App\BaseModel;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public $locale;
    public $model;

    public function __construct()
    {
        $this->locale = app('locale') == '' ? '' : app('locale') . '.';
        $this->model = new BaseModel();

    }

    /**
     * Display a listing of the resource.
     *
     * @param $page
     * @return Response
     */
    public function show($page)
    {
        $theme = $this->getTheme();

        if (file_exists($this->model->getUrlFile('/themes/default/assets/js/' . $page . '.js'))) {
            $theme->asset()->container('footer')->add(str_random(10), asset('themes/default/assets/js/' . $page . '.js'));
        }
        if (file_exists($this->model->getUrlFile('/themes/default/assets/css/' . $page . '.css'))) {
            $theme->asset()->add(str_random(10), asset('themes/default/assets/css/' . $page . '.css'));
        }

        $title = $page;
        $theme->setTitle($title);

        if (!file_exists($this->model->getUrlFile('/themes/default/views/modules/pages/' . $page . '.blade.php'))) {
            return abort(404);
        }

        return $theme->scope('modules.pages.'.$page, [])->render();

    }

}
