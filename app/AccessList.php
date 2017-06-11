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


class AccessList extends BaseModel
{

    protected $table = 'access_list';
    protected $primaryKey = 'id';
    protected $fillable = ['access_group_id', 'user_id', 'employee_id', 'action_id', 'access', 'creator_id', 'status'];

    protected $hidden = ['remember_token'];
    public $errors;
    public $rules = [
        'action_id' => 'required'
        , 'creator_id' => 'required'
    ];

    const ACCESS = 1;
    const NOT_ACCESS = 0;


    public function addAccessToGroup($group_id, $action_ids, $creator_id)
    {

        $this->where('access_group_id', $group_id)->whereNotIn('action_id', $action_ids)->update(['status' => 0, 'updated_at' => date('Y-m-d H:i:s')]);
        $insertItems = [];
        foreach ($action_ids as $item) {
            $dataAction = $this->where('access_group_id', $group_id)->where('action_id', $item)->first();
            if ($dataAction) {
                $dataAction->status = 1;
                $dataAction->access = 1;
                $dataAction->save();
            } else {
                $insertItems[] = ['action_id' => $item,
                    'access_group_id' => $group_id,
                    'creator_id' => $creator_id,
                    'status' => 1,
                    'access' => 1,
                    'created_at' => date('Y-m-d H:i:s')];
            }

        }

        $result = $this->insert($insertItems);

        return $result;
    }

} 