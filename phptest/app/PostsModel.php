<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model{

    //表名
    protected $table = 'posts';

    protected $primaryKey = 'id';

    public function hasManyPosts(){
        return $this->hasMany('App\DzinfoModel','postsid','id');
    }

    public function user(){
        return $this->belongsToMany(UserModel::class, 'dzinfo', 'postsid', 'userid');
    }
}
