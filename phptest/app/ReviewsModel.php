<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewsModel extends Model
{

    //表名
    protected $table = 'reviews';

    protected $primaryKey = 'id';

    public function getReviews($postsid)
    {
        $info = $this->where('postsid', $postsid)->get();

        return $info ? $info->toArray() : false;
    }

}
