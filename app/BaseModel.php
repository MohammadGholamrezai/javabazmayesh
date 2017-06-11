<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class BaseModel extends Model
{

    public function getUrlRoute($as_url, $params = null, $checkPermission = false, $user_id = 0)
    {

        if (!$as_url)
            return false;

        $locale = app('locale') == '' ? '' : app('locale') . '.';

        if ($checkPermission) {
            $access = $this->checkUrlPermission($as_url, $user_id);

            if (!$access)
                return false;

        }

        $url = null;
        try {
            $url = URL::route($locale . $as_url, $params);
            return $url;
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function checkUrlPermission($as_url, $user_id)
    {

        $userGroups = UserAccessGroup::where('employee_id', $user_id)->where('status', 1)->lists('access_group_id');
        $actionCall = ActionsList::where('as_url', $as_url)->first();

        if (!$actionCall)
            return false;

        $userAccess = AccessList::whereIn('access_group_id', $userGroups)
            ->where('action_id', $actionCall->id)
            ->where('status', 1)
            ->where('access', 1)->first();

        if ($userAccess)
            return true;

        return false;

    }

    public function getUploadUrl($folder = '/uploads/')
    {

        $publicUrl = $this->getUrlFile($folder);
        if (!file_exists($publicUrl)) {
            mkdir($publicUrl, 0777);
        }
        $folderName = md5(mt_rand());
        if (!file_exists($publicUrl . $folderName)) {
            mkdir($publicUrl . $folderName, 0777);
        }

        return ['url' => $publicUrl, 'folderName' => $folderName];

    }

    public function getUrlFile($url = '/uploads/')
    {
        $publicUrl = base_path() . env('PUBLIC_PATH_URL', 'public');
        $publicUrl .= $url;

        return $publicUrl;
    }

    public function getSystemModel($name = 'content')
    {

        $model = "App\\" . ucfirst($name);
        $objModel = new $model();

        if ($objModel)
            return $objModel;

        return false;

    }

    public function removeDirectory($directory)
    {
        foreach (glob("{$directory}/*") as $file) {
            if (is_dir($file)) {
                $this->removeDirectory($file);
            } else {
                unlink($file);
            }
        }
        $result = rmdir($directory);

        return $result;
    }

    public function checkPermission($request, $user_id)
    {
        //return true;

//        dd($request['currentRoute']->getActionName(), $user_id);

        if ($request['prefix'] == 'cpAdmin') {
//
//            $routeAddress = Route::getRoutes()->getByName($request['prefix'].
//                '.'.$request['controller'].
//                '.'.(isset($request['functionCalled'])&&$request['functionCalled']?$request['functionCalled']:'index'))->getActionName();

            $routeAddress = $request['currentRoute']->getActionName();
            $routeArr = explode("@", $routeAddress);
            $function = end($routeArr);
            $routeArr = explode("\\", $routeArr[0]);
            $controller = end($routeArr);

            $userGroups = UserAccessGroup::where('employee_id', $user_id)->where('status', 1)->lists('access_group_id');
            $actionCall = ActionsList::where('prefix', $request['prefix'])
                ->where('controller', $controller)
                ->where('function', $function)
                ->where('method', strtolower($request['method']))->first();

            if (!$actionCall)
                return false;

            $userAccess = AccessList::whereIn('access_group_id', $userGroups)
                ->where('action_id', $actionCall->id)
                ->where('status', 1)
                ->where('access', 1)->first();

            if ($userAccess)
                return true;

            return false;
        } else {
            //for front and public
            return true;
        }

    }

    const level_success = 'success';
    const level_warning = 'warning';
    const level_danger = 'danger';

    public function isValid($attributes = null, $rules = null, $message = null)
    {
        $validation = Validator::make($attributes ? $attributes : $this->attributes, $rules ? $rules : $this->rules, $message ? $message : isset($this->messages) ? $this->messages : []);
        if ($validation->fails()) {
            $this->errors = $validation->messages();
            return false;
        }
        return true;
    }

    public function saveItemLang($params)
    {
        $table = $params['table'];
        $arrItems = $params['items'];
        if (!$table || !$arrItems) {
            return false;
        }
        $result = DB::table($table)->insert($arrItems);
        return $result;
    }

    public function updateItemLang($params)
    {
        $lang_id = $params['lang_id'];
        $id = $params['id'];
        $name_id_field = isset($params['name_id_field']) ? $params['name_id_field'] : 'id';
        $table = $params['table'];
        $arrItems = $params['items'];
        if (!$lang_id || !$id || !$table || !$arrItems) {
            return false;
        }
        $result = DB::table($table)->where($name_id_field, '=', $id)->where('lang_id', '=', $lang_id)->update($arrItems);
        return $result;
    }

}
