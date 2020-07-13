<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepModel extends Model
{

    //表名
    protected $table = 'dep';

    protected $primaryKey = 'id';

    public function reviews(){

        return $this->belongsToMany(ReviewsModel::class, 'user', 'depid', 'id', '', 'userid');
    }

}
