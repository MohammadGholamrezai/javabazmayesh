<?php

/**
 * Created by PhpStorm.
 * User: Hamid
 * Date: 13/01/2015
 * Time: 09:03 AM
 */
namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;


class AccessGroups extends BaseModel
{

    protected $table = 'access_groups';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'type', 'status'];

    protected $hidden = ['remember_token'];
    public $errors;
    public $rules = [
        'name' => 'required'
        , 'type' => 'required'
    ];

    const TYPE_BACKEND = 'cpAdmin';
    const TYPE_FRONTEND = 'frontend';
    const TYPE_PUBLIC = 'public';

    public function getGroupList($inputs)
    {

        $paginateNum = $inputs['paginateNum'] = 10;
        $data = $this
            ->where('status', 1)
            ->where(function ($query) use ($inputs) {

                if (isset($inputs['type']) && $inputs['type']) {
                    $query->where('type', $inputs['type']);
                }
                if (isset($inputs['name']) && $inputs['name']) {
                    $query->where('name', 'LIKE', '%' . $inputs['name'] . '%');
                }

            })
            ->orderBy('access_groups.type', 'DESC')
            ->orderBy('access_groups.name', 'DESC')
            ->paginate($paginateNum);

        return $data;
    }


    public function removeUsersFromGroup($group_id)
    {
        $result = UserAccessGroup::where('access_group_id', $group_id)->update(['status' => 0, 'updated_at' => date('Y-m-d H:i:s')]);

        return $result;
    }

    public function addUsersFromGroup($group_id, $user_ids, $typeUser = 'employee_id')
    {

        $insertItems = [];
        foreach ($user_ids as $item) {

            $dataUser = UserAccessGroup::where($typeUser, $item)->where('access_group_id', $group_id)->first();
            if ($dataUser) {
                $dataUser->status = 1;
                $dataUser->save();
            } else {
                $insertItems[] = [$typeUser => $item, 'access_group_id' => $group_id, 'created_at' => date('Y-m-d H:i:s')];
            }

        }

        $result = UserAccessGroup::insert($insertItems);

        return $result;
    }

} 