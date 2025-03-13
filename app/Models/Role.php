<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'guard_name' , 'created_at' , 'updated_at'];


    public static function rule($id = null){
        return [
            'name' =>  'string|required|unique:roles,name,'.$id,
        ];
    }
    public static function accessRule(){
        return [
            'role_id' =>  'string|required|exists:roles,id',
            'module' => "array|required",
            'module.*' => 'string|required|exists:modules,id'
        ];
    }

    public static function pluckActiveRecords(){
        return Role::where('id' , '!=' , 1)->orderBy('name' , 'asc')->get()->pluck('name' , 'id')->toArray() ?? [];
    }
}
