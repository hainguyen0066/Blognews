<?php

namespace App\Models;
use DB;

class UserModel extends AdminModel
{
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function __construct() {
        $this->table               = 'users';
        $this->folderUpload        = 'user' ;
        $this->fieldSearchAccepted = ['id', 'username', 'email', 'fullname'];
        $this->crudNotAccepted     = ['_token','avatar_current', 'password_confirmation', 'task'];
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;
        if ($options['task'] == "admin-list-items") {
            $allUsers = self::select('*');
            if ($params['filter']['status'] !== "all") {
                $allUsers->where('status', '=', $params['filter']['status']);
            }

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $allUsers->Search($this->fieldSearchAccepted, $params);
                } else {
                    if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                        $allUsers->Search($this->fieldSearchAccepted, $params, false);
                    }
                }
            }

            $result = $allUsers->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);

        }

        return $result;
    }

    public function countItems($params = null, $options  = null) {

        $result = null;
        if($options['task'] == 'admin-count-items-group-by-status') {
            $query = $this::groupBy('status')->select( DB::raw('status , COUNT(id) as count') );
            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->Search($this->fieldSearchAccepted, $params);
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->Search($this->fieldSearchAccepted, $params, false);
                }
            }
            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $options = null) {
        $result = null;

        if($options['task'] == 'get-item') {
            $result = self::select('*')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'get-avatar') {
            $result = self::select('id', 'avatar')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'auth-login') {
            $result = self::select('id', 'username', 'fullname', 'email', 'level', 'avatar')
                    ->where('status', 'active')
                    ->where('email', $params['email'])
                    ->where('password', md5($params['password']) )->first();

            if($result) $result = $result->toArray();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) {
        if($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status ]);
        }

        if($options['task'] == 'add-item') {
            $params['created_by'] = "hailan";
            $params['created']    = date('Y-m-d');
            $params['avatar']      = $this->uploadThumb($params['avatar']);
            $params['password']    = md5($params['password']);
            self::insert($this->prepareParams($params));
        }

        if($options['task'] == 'edit-item') {
            if(!empty($params['avatar'])){
                $this->deleteThumb($params['avatar_current']);
                $params['avatar'] = $this->uploadThumb($params['avatar']);
            }
            $params['modified_by']   = "hailan";
            $params['modified']      = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($options['task'] == 'change-level') {
            $level = $params['currentLevel'];
            self::where('id', $params['id'])->update(['level' => $level]);
        }

        if($options['task'] == 'change-level-post') {
            $level = $params['level'];
            self::where('id', $params['id'])->update(['level' => $level]);
        }

        if($options['task'] == 'change-password') {
            $password       = md5($params['password']);
            self::where('id', $params['id'])->update(['password' => $password]);
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if($options['task'] == 'delete-item') {
            $item   = self::getItem($params, ['task'=>'get-avatar']); //
            $this->deleteThumb($item['avatar']);
            self::where('id', $params['id'])->delete();
        }
    }

    public function scopeSearch($query, $field = null, $arr = null, $byAllColumn = true){
        if ($byAllColumn) {
            return $query->where(function($query) use ($field, $arr){
                foreach($field as $column){
                    $query->orWhere($column, 'LIKE',  "%{$arr['search']['value']}%" );
                }
            });
        }else {
            return $query->where($arr['search']['field'], 'LIKE',  "%{$arr['search']['value']}%" );
        }
    }
}

