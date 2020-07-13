<?php

namespace App\Http\Controllers;

use App\DepModel;

class DepController extends Controller
{

    //根据部门查下评论信息
    public function getRevinfo($depid){

        $rev = DepModel::findOrFail($depid);
        return $rev->reviews;
    }
}
