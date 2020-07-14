<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model{

    //表名
    protected $table = 'posts';

    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsToMany(UserModel::class, 'dzinfo', 'postsid', 'userid');
    }

    public function getuser(){

        return $this->belongsTo(UserModel::class, 'creatorId', 'id');
    }

    public function getDz(){

        return $this->hasMany(DzinfoModel::class, 'postsid', 'id');
    }

    public function getReviews(){

        return $this->hasMany(ReviewsModel::class, 'postsid', 'id');
    }

}
