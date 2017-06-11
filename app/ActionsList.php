<?php

/**
 * Created by PhpStorm.
 * User: Hamid
 * Date: 13/01/2015
 * Time: 09:03 AM
 *
 *
 *
 *         $routeCollection = Route::getRoutes();
 * $dataInsert =[];
 * $counter=0;
 * foreach ($routeCollection as $value) {
 * if(strpos($value->getActionName(),'backend')){
 * //                echo $value->getPath().'<br>';
 * //                echo $value->getMethods()[0].'<br>';
 * //                echo $value->getActionName().'<br>';
 *
 * if(in_array(strtolower($value->getMethods()[0]),['get','post','put','delete'])){
 * $dataInsert[$counter]['method'] = strtolower($value->getMethods()[0]);
 * $dataArr = explode("@",$value->getActionName());
 *
 * $dataInsert[$counter]['function'] = end($dataArr);
 * $dataArr = explode("\\",$dataArr[0]);
 * $dataInsert[$counter]['controller'] = end($dataArr);
 * $counter++;
 *
 * }
 *
 * //                dd($value);
 * }
 *
 * }
 *
 *
 * foreach (Route::getRoutes()->getRoutes() as $route)
 * {
 * $action = $route->getAction();
 *
 * if (array_key_exists('controller', $action)&&array_key_exists('namespace', $action))
 * {
 *
 * $dataArr = explode($action['namespace'],$action['controller']);
 *
 * if(strpos($action['controller'],'backend')&&count($dataArr)==2){
 *
 * }
 *
 * $controllers[] = $action['controller'];
 * }
 * }
 *
 */
namespace App;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;


class ActionsList extends BaseModel
{

    protected $table = 'actions_list';
    protected $primaryKey = 'id';
    protected $fillable = ['prefix', 'controller', 'function', 'as_url', 'method', 'employee_id', 'status'];

    protected $hidden = ['remember_token'];
    public $errors;
    public $rules = [
        'controller' => 'required'
        , 'function' => 'required'
        , 'prefix' => 'required'
        , 'method' => 'required'
    ];

    const METHOD_POST = 'post';
    const METHOD_GET = 'get';
    const METHOD_DELETE = 'delete';
    const METHOD_PUT = 'put';


    public function getActionList($inputs)
    {

        $paginateNum = $inputs['paginateNum'];
        $data = $this
            ->where('status', 1)
            ->where(function ($query) use ($inputs) {

                if (isset($inputs['function']) && $inputs['function']) {
                    $query->where('function', 'LIKE', '%' . $inputs['function'] . '%');
                }
                if (isset($inputs['method']) && $inputs['method']) {
                    $query->where('method', 'LIKE', '%' . $inputs['method'] . '%');
                }
                if (isset($inputs['prefix']) && $inputs['prefix']) {
                    $query->where('prefix', 'LIKE', '%' . $inputs['prefix'] . '%');
                }
                if (isset($inputs['controller']) && $inputs['controller']) {
                    $query->where('controller', 'LIKE', '%' . $inputs['controller'] . '%');
                }

            })
            ->orderBy('actions_list.prefix')
            ->orderBy('actions_list.controller', 'DESC')
            ->orderBy('actions_list.function', 'DESC')
            ->orderBy('actions_list.method', 'DESC')
            ->paginate($paginateNum);

        return $data;

    }

    public function getAllRoute()
    {
        $routeCollection = Route::getRoutes();
        $dataInsert = [];
        $counter = 0;
        foreach ($routeCollection as $value) {
            if (strpos($value->getActionName(), 'front')) {
                $dataInsert[$counter]['prefix'] = 'frontend';
            } elseif (strpos($value->getActionName(), 'cpAdmin')) {
                $dataInsert[$counter]['prefix'] = 'cpAdmin';
            } else {
                $dataInsert[$counter]['prefix'] = 'public';
            }
//                echo $value->getPath().'<br>';
//                echo $value->getMethods()[0].'<br>';
//                echo $value->getActionName().'<br>';

            if (in_array(strtolower($value->getMethods()[0]), ['get', 'post', 'put', 'delete'])) {

                $dataInsert[$counter]['method'] = strtolower($value->getMethods()[0]);
                $dataArr = explode("@", $value->getActionName());

                $dataInsert[$counter]['function'] = end($dataArr);
                $dataArr = explode("\\", $dataArr[0]);
                $dataInsert[$counter]['controller'] = end($dataArr);
                $dataInsert[$counter]['created_at'] = date('Y-m-d h:i:s');
                $dataInsert[$counter]['employee_id'] = 1;

                $isValid = true;
                $countFn = 0;
                foreach ($dataInsert as $item) {

                    if ($item['controller'] == $dataInsert[$counter]['controller']
                        && $item['function'] == $dataInsert[$counter]['function']
                        && $item['prefix'] == $dataInsert[$counter]['prefix']
                        && $item['method'] == $dataInsert[$counter]['method']
                    ) {
                        if ($countFn) {
                            $isValid = false;
                        }
                        $countFn++;
                    }
                }

                if ($isValid) {
                    $counter++;
                } else {
                    unset($dataInsert[$counter]);
                }


            }
        }

//        dd($dataInsert);

        $this->insert($dataInsert);
        return $dataInsert;


    }

} 
