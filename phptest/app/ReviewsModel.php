<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewsModel extends Model
{

    //表名
    protected $table = 'reviews';

    protected $primaryKey = 'id';

    //评论数修改器
    public function setReviewsCouAttribute($value){

        $this->attributes['reviews_cou'] = ReviewsModel::where('postsid', $value)->count();
    }

    //评论数访问器
    public function getReviewsCouAttribute($value)
    {
        return $value;
    }

    //通过审核的评论列表-查询作用域
    public function scopeCheckflage($query)
    {
        return $query->where('checkflage', 1);
    }

    //根据postsid查询评论列表-查询作用域
    public function scopeReviewspostsid($query, $postsid)
    {
        return $query->where('postsid', $postsid);
    }

}
