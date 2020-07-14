<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //表名
    protected $table = 'user';

    protected $primaryKey = 'id';

//    public function getUserPosts($id){
//
//        $where['user.id'] = $id;
//        $info = $this->leftJoin('posts','user.id','=','posts.creatorId')->where($where)->get();
//
//        return $info ? $info->toArray() : false;
//    }

    public function posts(){
        return $this->belongsToMany(PostsModel::class, 'dzinfo', 'userid', 'postsid');
    }


    public function showPosts(){

        return $this->hasMany(PostsModel::class, 'creatorId', 'id');
    }

}
