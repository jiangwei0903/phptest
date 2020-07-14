<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepModel extends Model
{

    //表名
    protected $table = 'dep';

    protected $primaryKey = 'id';

    public function reviews(){

        return $this->hasManyThrough(PostsModel::class, UserModel::class, 'depid', 'creatorId', 'id', 'id');
    }

}
